<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class ProductApiTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_product()
    {   

        $user = User::factory(User::class)->create();
        $this->actingAs($user, 'sanctum');

        $product = [
            'name' => 'Tecno Camon three',
            'slug' => 'tecno-camon-3',
            'price' => '200000',

        ];
        $this->withoutExceptionHandling();
        $this->json('POST',route('product.store'), $product)
            ->assertStatus(201)
            ->assertJson($product);

    }

    // public function test_update_product()
    // {   

    //     $user = User::factory(User::class)->make();

    //     $this->actingAs($user, 'sanctum');

    //     $product = [
    //         'name' => 'Iphone Camon three and Four',
    //         'slug' => 'tecno-camon-3',
    //         'price' => '200000',

    //     ];
    //     $this->withoutExceptionHandling();
    //     $this->json('PUT',route('product.update',$product->id), $product)
    //         ->assertStatus(200)
    //         ->assertJson($product);

    // }

    public function test_show_product(){

        
        $user = User::factory(User::class)->create();
        $this->actingAs($user, 'sanctum');

        
        $product = Product::factory(Product::class)->make();
        $user->product()->save($product);
        $this->get(route('product.show',$product->id))->assertStatus(200);
    }
}
