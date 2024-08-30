<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\User;
use App\Models\Condition;
use App\Models\Brand;

class ProductReadTest extends TestCase
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
        
        $condition = Condition::factory()->create();
        
        $brand = Brand::factory()->create();
        
        Product::factory()->count(20)->create([
            'seller_id' => $user->id,
            'condition_id' => $condition->id,
            'brand_id' => $brand->id,
            'buyer_id' => null,
        ]);
        
        $response = $this->get('/');
        
        $response->assertStatus(200);
        
        $response->assertViewHas('products');
    }
}
