<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);

        $role2 = Role::create(['name' => 'agency']);

        $role3 = Role::create(['name' => 'user']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = factory(App\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('demo'),
        ]);
        $user->assignRole($role1);

        $user = factory(App\User::class)->create([
            'name' => 'agency1',
            'email' => 'agency1@gmail.com',
            'password' =>  Hash::make('demo'),
        ]);
        $user->assignRole($role2);

        $user = factory(App\User::class)->create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' =>  Hash::make('demo'),
        ]);
        $user->assignRole($role3);
    }
}
