<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        // DB::table('role_user')->truncate();

        $roleAdmin = Role::where('name', 'admin')->first();
        $roleStaff = Role::where('name', 'staff')->first();
        $roleUser = Role::where('name', 'user')->first();
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
        ]);

        $staff = User::create([
            'name' => 'Staff',
            'email' => 'staff@mail.com',
            'password' => bcrypt('staff'),
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('user'),
        ]);

        $admin->role()->attach($roleAdmin);
        $staff->role()->attach($roleStaff);
        $user->role()->attach($roleUser);
    }
}
