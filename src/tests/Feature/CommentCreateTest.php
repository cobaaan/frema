<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Condition;
use App\Models\Product;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentCreateTest extends TestCase
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
        
        $condition = Condition::factory()->create();
        
        $brand = Brand::factory()->create();
        
        $product = Product::factory()->create([
            'condition_id' => $condition->id,
            'brand_id' => $brand->id,
        ]);
        
        $data = [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => 'テストテスト、テスト用のコメントです',
        ];
        
        $response = $this->post('/comment/send', $data);
        
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        $response->assertSessionHas('message', 'コメントが送信されました。');
        
        $this->assertDatabaseHas('comments', [
            'comment' => 'テストテスト、テスト用のコメントです',
        ]);
    }
}
