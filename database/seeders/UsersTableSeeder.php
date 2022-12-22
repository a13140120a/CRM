<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'              => 1,
            'name'            => 'Example Admin',
            'email'           => 'admin@example.com',
            'password'        => bcrypt('admin123'),
            'status'          => 1,
            // 'role_id'         => 1,
            // 'view_permission' => 'global',
        ]);

        DB::table('users')->insert([
            'name' => 'hello',
            'email' => 'shindt1969@gmail.com',
            'password' => bcrypt('1234'),
            // 'role_id' => '1',
            // 'view_permission' => "global"
        ]);
        DB::table('users')->insert([
            'name' => 'hello',
            'email' => 'shindt4969@gmail.com',
            'password' => bcrypt('1234'),
            // 'role_id' => '1',
            // 'view_permission' => "global"
        ]);
        DB::table('users')->insert([
            'name' => 'hello',
            'email' => 'shindt6969@gmail.com',
            'password' => bcrypt('1234'),
            // 'role_id' => '1',
            // 'view_permission' => "global"
        ]);
    }
}
