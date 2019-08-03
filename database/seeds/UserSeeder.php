<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::firstOrCreate([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('admin'),
            'is_active' => 1,
            'user_invited_token' => str_random(60),
            'user_type_id' => 1
        ]);
        // Users::firstOrCreate([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('admin'),
        //     'is_active' => 1,
        //     'user_invited_token' => str_random(60),
        //     'user_type_id' => 2
        // ]);
        // Users::firstOrCreate([
        //     'name' => 'Admin2',
        //     'email' => 'admin2@admin.com',
        //     'password' => bcrypt('admin'),
        //     'is_active' => 1,
        //     'user_invited_token' => str_random(60),
        //     'user_type_id' => 2
        // ]);
        // Users::firstOrCreate([
        //     'name' => 'Laravel User 1',
        //     'email' => 'user1@laravel.com',
        //     'password' => bcrypt('user123'),
        //     'is_active' => 1,
        //     'user_invited_token' => str_random(60),
        //     'user_type_id' => 3
        // ]);
        // Users::firstOrCreate([
        //     'name' => 'Laravel User 2',
        //     'email' => 'user2@laravel.com',
        //     'password' => bcrypt('user123'),
        //     'is_active' => 0,
        //     'user_invited_token' => str_random(60),
        //     'user_type_id' => 3
        // ]);
        // Users::firstOrCreate([
        //     'name' => 'Laravel User 3',
        //     'email' => 'user3@laravel.com',
        //     'password' => bcrypt('user123'),
        //     'is_active' => 1,
        //     'user_invited_token' => str_random(60),
        //     'user_type_id' => 3
        // ]);
    }
}
