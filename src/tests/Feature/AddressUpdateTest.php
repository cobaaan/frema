<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Profile;
use App\Models\Payment;

class AddressUpdateTest extends TestCase
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
        $payment = Payment::factory()->create();
        
        Profile::factory()->create([
            'user_id' => $user->id,
            'payment_id' => $payment->id,
        ]);
        
        $this->actingAs($user);
        
        $data = [
            'postcode' => '9008790',
            'address' => '沖縄県那覇市前島2-21-7',
            'building' => '沖縄総合事務局開発',
            'product_id' => 1,
        ];
        
        $response = $this->post('/profile/address/change', $data);
        
        $response->assertStatus(302);
        $response->assertRedirect('/thanks');
        $this->assertEquals('/thanks', parse_url($response->headers->get('Location'), PHP_URL_PATH));
        
        $response->assertSessionHas('message', '住所が変更されました。');
        
        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'postcode' => '9008790',
            'address' => '沖縄県那覇市前島2-21-7',
            'building' => '沖縄総合事務局開発',
        ]);
        
    }
}
