<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view subscribers']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'view visitors']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('view subscribers');
        $role->givePermissionTo('view users');
        $role->givePermissionTo('view visitors');

        User::factory()->create([
            'name' => 'Foo Bar',
            'email' => 'foo@bar',
        ])->assignRole('admin');

        User::factory()->times(random_int(5, 15))->create();
    }
}
