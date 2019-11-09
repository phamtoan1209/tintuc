<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_id = DB::table('admins')->insertGetId([
            'fullname' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'is_active' => 1,
        ]);

        $role_id = DB::table('roles')->insertGetId([
            'name' => 'Super Admin',
            'access' => 'superadmin',
        ]);

        DB::table('role_admins')->insert([
            'role_id' => $role_id,
            'admin_id' => $admin_id,
        ]);
    }
}
