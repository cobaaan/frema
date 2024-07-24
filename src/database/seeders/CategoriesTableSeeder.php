<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'name' => '絵画',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '美術品',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'バッグ',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'レディース',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '飛行機',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'ジャンボジェット',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '像',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '生鮮品',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '魚',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '鍋',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'キッチン用品',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '時計',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'アンティーク',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'コップ',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '船',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'ボート',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'サングラス',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'アクセサリー',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'メガネ',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'ギター',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '楽器',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '椅子',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'ソファ',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '靴',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'ビジネス',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'カジュアル',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '冷蔵庫',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => '家電',
        ];
        DB::table('categories')->insert($param);
        
        $param = [
            'name' => 'リモコン',
        ];
        DB::table('categories')->insert($param);
    }
}
