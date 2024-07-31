<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'name' => 'カール',
            'email' => 'uncle-kerl@calbee.example',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => 'ポール',
            'email' => 'paul@beatles.example',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ];
        DB::table('users')->insert($param);
        
        User::factory()->count(18)->create();
    }
}
