<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Condition;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment; // コメントモデルのインポート

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentCreateTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_example()
    {
        // ユーザーを作成し、認証状態に設定
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // 条件、ブランド、商品の関連データを作成
        $condition = Condition::factory()->create();
        $brand = Brand::factory()->create();
        
        // 商品作成時に seller_id を設定
        $product = Product::factory()->create([
            'seller_id' => $user->id,
            'buyer_id' => $user->id,
            'condition_id' => $condition->id,
            'brand_id' => $brand->id,
        ]);
        
        // テストで使用するコメントデータ
        $data = [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => 'テストテスト、テスト用のコメントです',
        ];
        
        // コメント送信リクエストの実行
        $response = $this->post('/comment/send', $data);
        
        // ステータスコード、リダイレクト先、セッションメッセージの確認
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        $response->assertSessionHas('message', 'コメントが送信されました。');
        
        // comments テーブルに期待するデータが挿入されたか確認
        $this->assertDatabaseHas('comments', [
            'comment' => 'テストテスト、テスト用のコメントです',
            'user_id' => $user->id, // ユーザーIDを確認
            'product_id' => $product->id, // 商品IDを確認
        ]);
    }
}

