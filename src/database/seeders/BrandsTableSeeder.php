<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'name' => 'LouisVuitton'
        ];
        DB::table('brands')->insert($param);
        
        $param = [
            'name' => 'Panasonic'
        ];
        DB::table('brands')->insert($param);
        
        $param = [
            'name' => 'toyota'
        ];
        DB::table('brands')->insert($param);
    }
}
