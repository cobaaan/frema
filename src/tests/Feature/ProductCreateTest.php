<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Mockery;

class ProductCreateTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_example()
    {
        // ユーザーの作成とログイン処理
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // 仮のストレージディスク
        Storage::fake('public');
        
        // 必要なモデルの作成
        $condition = Condition::factory()->create();
        $brand = Brand::factory()->create();
        
        // ExhibitionController のモック作成
        $controller = Mockery::mock(ExhibitionController::class);
        
        $controller->shouldReceive('conditionGet')
        ->andReturn($condition->id);  // モックでconditionを返すように修正
        
        $controller->shouldReceive('brandGet')
        ->andReturn($brand->id);  // モックでbrandを返すように修正
        
        $this->app->instance(ExhibitionController::class, $controller);
        
        // 画像アップロード部分をモック化
        $mockedFile = UploadedFile::fake()->image('test.jpg');  // `UploadedFile::fake()`で画像をモック化
        
        // フォームデータ作成
        $data = [
            'seller_id' => $user->id,
            'condition' => $condition->condition,
            'brand' => $brand->name,
            'name' => 'テスト商品',
            'image_path' => $mockedFile,  // モックファイルを使用
            'price' => 1000,
            'description' => 'テスト商品の説明',
            'tags' => json_encode([
                ['value' => 'タグ1'],
                ['value' => 'タグ2']
            ]),
        ];
        
        // フォーム送信
        $response = $this->post('/sell', $data);
        
        // レスポンスの確認
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        $response->assertSessionHas('message', '商品を出品しました。');
        
        // データベース確認
        $this->assertDatabaseHas('products', [
            'name' => 'テスト商品',
            'price' => 1000,
        ]);
    }
}
