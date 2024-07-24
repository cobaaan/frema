<?php

namespace Database\Seeders;

use App\Models\Comment;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
            'product_id' => 1,
            'comment' => '家族を描いた絵画。昭和初期のありふれた家庭像をよくぞここまで書き上げられたものだと驚嘆いたします。赤ら顔で全裸のお父さんは今日もお仕事でお疲れなのでしょう。育児を手伝おうという雰囲気すら感じさせません。絵画の中央で子供らに絵本の読み聞かせをするお母さんからは、まさに聖母のような印象を受けます。「私はもう子供じゃない！」と怒り出す長女は、頭部の右側にお父さんを模して作られたお面をつけています。反抗期とはいえ、自分の洋服を買うことさえ後回しにして、身を粉にして働く父親への尊敬の表れでしょう。夜も遅いというのに、母親の上部を舞いながらラッパを吹き鳴らす次女からは天真爛漫な奔放さを感じます。左側にいるカメラ目線の男の子は末っ子の長男です。こちらも長女と同じく父親リスペクトなのか、布を一枚淫らに着こなしているだけの半裸体です。風邪をひかないか心配です。世間ではコロナがまだまだ流行っているというのに、子供は風の子！　そんなことを気にしていては末っ子長男の名折れです。手には何やら巻物を持っていますね。彼は勉強家でもあるのでしょう。'
        ];
        DB::table('comments')->insert($param);
        
        Comment::factory()->count(100)->create();
    }
}
