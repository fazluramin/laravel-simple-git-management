<?php

use Illuminate\Database\Seeder;
use App\Models\UserTypes;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserTypes::firstOrCreate([
            'name' => 'Super Admin'
        ]);
        UserTypes::firstOrCreate([
            'name' => 'Admin'
        ]);
        UserTypes::firstOrCreate([
            'name' => 'User'
        ]);
    }
}
