<?php

namespace Database\Seeders;

use App\Models\Favorite;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Favorite::factory()->count(100)->create();
    }
}
