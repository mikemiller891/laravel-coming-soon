<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Exception;
use Illuminate\Database\Seeder;

class DevVisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Visitor::factory()->times(random_int(10, 100))->create();
    }
}
