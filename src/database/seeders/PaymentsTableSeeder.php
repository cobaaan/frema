<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'payment' => 1
        ];
        DB::table('payments')->insert($param);
        $param = [
            'payment' => 2
        ];
        DB::table('payments')->insert($param);
        $param = [
            'payment' => 3
        ];
        DB::table('payments')->insert($param);
    }
}
