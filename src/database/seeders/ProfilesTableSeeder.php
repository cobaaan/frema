<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'payment_id' => 1,
            'image_path' => 'storage/images/kerl.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 2,
            'payment_id' => 1,
            'image_path' => 'storage/images/paul.jpg',
            'postcode' => '1006390',
            'address' => 'イギリス ロンドン 3-7-1',
            'building' => 'アップルスタジオ',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 3,
            'payment_id' => 1,
            'image_path' => 'storage/images/cup.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 4,
            'payment_id' => 1,
            'image_path' => 'storage/images/pink_bag.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 5,
            'payment_id' => 1,
            'image_path' => 'storage/images/yellow_bag.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 6,
            'payment_id' => 1,
            'image_path' => 'storage/images/clock.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 7,
            'payment_id' => 1,
            'image_path' => 'storage/images/carp.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 8,
            'payment_id' => 1,
            'image_path' => 'storage/images/angel.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 9,
            'payment_id' => 1,
            'image_path' => 'storage/images/pot.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 10,
            'payment_id' => 1,
            'image_path' => 'storage/images/airplane.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 11,
            'payment_id' => 1,
            'image_path' => 'storage/images/carp.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 12,
            'payment_id' => 1,
            'image_path' => 'storage/images/family.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 13,
            'payment_id' => 1,
            'image_path' => 'storage/images/carp.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 14,
            'payment_id' => 1,
            'image_path' => 'storage/images/angel.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 15,
            'payment_id' => 1,
            'image_path' => 'storage/images/chair.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 16,
            'payment_id' => 1,
            'image_path' => 'storage/images/ferry_boat.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 17,
            'payment_id' => 1,
            'image_path' => 'storage/images/clock.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 18,
            'payment_id' => 1,
            'image_path' => 'storage/images/remote_control.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 19,
            'payment_id' => 1,
            'image_path' => 'storage/images/color_glasses.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
        
        $param = [
            'user_id' => 20,
            'payment_id' => 1,
            'image_path' => 'storage/images/white_shoes.jpg',
            'postcode' => '1006390',
            'address' => '東京都千代田区丸の内1-8-3',
            'building' => '丸の内トラストタワー本館22階',
        ];
        DB::table('profiles')->insert($param);
    }
}
