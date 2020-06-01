<?php

namespace Tests\Feature\Api;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Error get All  Products
     *
     * @return void
     */
    public function testGetAllProductsError()
    {
        $tenant = 'fake_value';
        $response = $this->getJson("/api/v1/products?token_company={$tenant}");
        //$response->dump();

        $response->assertStatus(422);
    }

    /**
     * Error get products by tenant
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/products?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }

    /**
     *  Product Not Found
     *
     * @return void
     */
    public function testNotFoundProduct()
    {
        $product = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products/{$product}?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     *  get Product by identify
     *
     * @return void
     */
    public function testGetProductByIdentify()
    {

        $tenant = factory(Tenant::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->getJson("/api/v1/products/{$product->uuid}?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
