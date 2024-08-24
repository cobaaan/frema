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
        
        Storage::fake('public');
        
        $condition = Condition::factory()->create();
        $brand = Brand::factory()->create();
        
        $controller = Mockery::mock(SellController::class);
        
        $controller->shouldReceive('conditionGet')
        ->andReturn(1);
        
        $controller->shouldReceive('brandGet')
        ->andReturn(1);
        
        $this->app->instance(SellController::class, $controller);
        
        $data = [
            'seller_id' => $user->id,
            'condition' => $condition->condition,
            'brand' => $brand->name,
            'name' => 'テスト商品',
            'image_path' => UploadedFile::fake()->image('test.jpg'),
            'price' => 1000,
            'description' => 'テスト商品の説明',
            'tags' => json_encode([
                ['value' => 'タグ1'],
                ['value' => 'タグ2']
            ]),
        ];
        $response = $this->post('/sell', $data);
        
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        $response->assertSessionHas('message', '商品を出品しました。');
        
        $this->assertDatabaseHas('products', [
            'name' => 'テスト商品',
            'price' => 1000,
        ]);
    }
    
}
