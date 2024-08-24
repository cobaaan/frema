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
    /**
    * A basic feature test example.
    *
    * @return void
    */
    
    use RefreshDatabase;
    
    public function test_example()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        
        // ファイルのストレージをモック化
        Storage::fake('public');
        
        $condition = Condition::factory()->create();
        $brand = Brand::factory()->create();
        
        // モックした画像ファイルを使用
        $mockedFile = UploadedFile::fake()->image('test.jpg');
        
        $data = [
            'seller_id' => $user->id,
            'condition' => $condition->condition,
            'brand' => $brand->name,
            'name' => 'テスト商品',
            'image_path' => $mockedFile,  // モックしたファイルを使用
            'price' => 1000,
            'description' => 'テスト商品の説明',
            'tags' => json_encode([
                ['value' => 'タグ1'],
                ['value' => 'タグ2']
            ]),
        ];
        
        $response = $this->post('/sell', $data);
        
        // レスポンスのステータスとリダイレクト先を確認
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        $response->assertSessionHas('message', '商品を出品しました。');
        
        // データベースに商品が登録されているか確認
        $this->assertDatabaseHas('products', [
            'name' => 'テスト商品',
            'price' => 1000,
        ]);
        
        // 画像が指定されたパスに保存されているか確認
        Storage::disk('public')->assertExists('test.jpg');
    }
    
    
}
