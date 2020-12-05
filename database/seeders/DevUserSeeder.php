<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DevUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);

        User::factory()->create([
            'email' => 'admin@foo.bar',
        ])->assignRole('admin');

        User::factory()->times(random_int(12, 24))->create();
    }
}
