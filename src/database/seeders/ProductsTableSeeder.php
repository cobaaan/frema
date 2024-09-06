<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'seller_id' => 1,
            'condition_id' => 1,
            'brand_id' => 1,
            'name' => '家族の肖像',
            'image_path' => 'images/family.jpg',
            'price' => 100000000,
            'description' => '家族の肖像画です。我が家は一家離散してしまい、家財整理をしなければならないほどに落ちぶれました。我が一族のありしひの肖像です。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 4,
            'condition_id' => 1,
            'brand_id' => 1,
            'name' => 'louisVuittonのバッグ',
            'image_path' => 'images/pink_bag.jpg',
            'price' => 89000,
            'description' => 'ルイヴィトンのバッグです。初期のデザインで一般には出回ることのなかった商品です。使用感がありますので、ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 7,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'louisVuittonのバッグ',
            'image_path' => 'images/yellow_bag.jpg',
            'price' => 100,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 3,
            'name' => '飛行機',
            'image_path' => 'images/airplane.jpg',
            'price' => 10000000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 2,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '天使の彫像',
            'image_path' => 'images/angel.jpg',
            'price' => 459800,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '生魚（鯉）',
            'image_path' => 'images/carp.jpg',
            'price' => 10,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '赤い鍋',
            'image_path' => 'images/pot.jpg',
            'price' => 1000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 3,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'バッキンガム宮殿に代々伝わる時計',
            'image_path' => 'images/clock.jpg',
            'price' => 100000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 3,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'スティーブ・ジョブス愛用のカップ',
            'image_path' => 'images/cup.jpg',
            'price' => 45900,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '豪華客船 10000人収容可 2024年製',
            'image_path' => 'images/ferry_boat.jpg',
            'price' => 999999999,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '映画「レオン」でジャン・レノが実際に使用したサングラス',
            'image_path' => 'images/color_glasses.jpg',
            'price' => 100000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'メガネ　裸眼で0.1のメガネです',
            'image_path' => 'images/glasses.jpg',
            'price' => 1500,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 3,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'エリック・クラプトン愛用のヴィンテージ・ギター',
            'image_path' => 'images/acoustic_guitar.jpg',
            'price' => 1000000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 9,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'john carpenterの遺品のギター　ほぼ新品　やや使用感あり',
            'image_path' => 'images/electric_guitar.jpg',
            'price' => 1280000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 9,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '北欧ノルウェー産チェアー',
            'image_path' => 'images/chair.jpg',
            'price' => 128000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 1,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => '革靴　本革　ブラウン',
            'image_path' => 'images/brown_shoes.jpg',
            'price' => 98000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 3,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'コンバースのバッタもんの靴',
            'image_path' => 'images/white_shoes.jpg',
            'price' => 980,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 3,
            'condition_id' => 2,
            'brand_id' => 2,
            'name' => 'パナソニック製の冷蔵庫',
            'image_path' => 'images/refrigerator.jpg',
            'price' => 10000,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
        
        $param = [
            'seller_id' => 2,
            'condition_id' => 2,
            'brand_id' => 1,
            'name' => 'テレビのリモコン',
            'image_path' => 'images/remote_control.jpg',
            'price' => 99,
            'description' => 'ルイヴィトンのバッグです。日本の幼稚園児の持つ通園鞄を見てヴィトンのトップデザイナーがデザインしたバッグです。ノークレームのリターンでお願いします。'
        ];
        DB::table('products')->insert($param);
    }
}
