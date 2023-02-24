<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetProducts()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'id',
                'title',
                'description',
                'price',
                'ready_for_sale',
                'created_at',
                'updated_at',
            ]
        ]);
    }
}
