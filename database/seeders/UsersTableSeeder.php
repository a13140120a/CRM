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
        // DB::table('users')->delete();

        DB::table('users')->insert([
            'id'              => 1,
            'name'            => 'Example Admin',
            'email'           => 'admin@example.com',
            'password'        => bcrypt('admin123'), 
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
            'status'          => 1,
            // 'api_token'       => Str::random(80),
            // 'role_id'         => 1,
            // 'view_permission' => 'global',
        ]);
    }
}
