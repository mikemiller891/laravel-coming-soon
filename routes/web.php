<?php

use App\Models\Visitor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'coming-soon');
Route::view('/welcome', 'welcome');

Route::view('/dashboard', 'dashboard')->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::middleware(['role:admin'])->prefix('/admin')->group(function () {
    Route::view('/', 'admin.index')->name('admin');
    Route::name('admin.')->group(function () {
        Route::view('/visitors', 'admin.visitors')->name('visitors');
        Route::get('/visitors/export', function () {
            // prepare content
            $visitors = Visitor::all();
            $content = '';
            foreach ($visitors as $visitor) {
                $content .= $visitor->email;
                $content .= "\n";
            }

            // file name that will be used in the download
            $fileName = "subscribers.txt";

            // use headers in order to generate the download
            $headers = [
                'Content-type' => 'text/plain',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
                'Content-Length' => strlen($content),
            ];

            // make a response, with the content, a 200 response code and the headers
            return Response::make($content, 200, $headers);
        })->name('visitors.export');
        Route::view('/users', 'admin.users')->name('users');
    });
});
