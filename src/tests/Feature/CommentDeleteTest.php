<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Brand;

class CommentDeleteTest extends TestCase
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
            'seller_id' => $user->id,
            'buyer_id' => $user->id,
            'condition_id' => $condition->id,
            'brand_id' => $brand->id,
        ]);
        
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => 'This is a test comment',
        ]);
        
        $response = $this->post('/admin/comment/delete', [
            'id' => $comment->id,
        ]);
        
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        
        $response->assertSessionHas('message', 'コメントを削除しました。');
        
        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }
}
