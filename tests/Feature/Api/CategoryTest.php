<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Error get Categories by tenant
     *
     * @return void
     */
    public function testGetAllCategoriesByTenantError()
    {
        $response = $this->getJson('/api/v1/categories');
        //$response->dump();

        $response->assertStatus(422);
    }

    /**
     * Error get Categories by tenant
     *
     * @return void
     */
    public function testGetAllCategoriesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/categories?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }

    /**
     *  get error Category by tenant
     *
     * @return void
     */
    public function testGetCategoriesByTenantError()
    {
        $category = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/{$category}?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     *  get Category by tenant
     *
     * @return void
     */
    public function testGetCategoriesByTenantr()
    {
        $category = factory(Category::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/{$category->uuid}?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
