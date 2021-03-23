<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'JonDow',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
        ]);

        User::factory()
            ->count(5)
            ->create();
    }
}
