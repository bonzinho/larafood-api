<?php

namespace Tests\Feature\Api;

use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TableTest extends TestCase
{
    /**
     * Error get Tables by tenant
     *
     * @return void
     */
    public function testGetAllTablesByTenantError()
    {
        $response = $this->getJson('/api/v1/tables');
        //$response->dump();

        $response->assertStatus(422);
    }

    /**
     * Error get Tables by tenant
     *
     * @return void
     */
    public function testGetAllTablesByTenant()
    {
        $tenant = factory(Tenant::class)->create();
        $response = $this->getJson("/api/v1/tables?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }

    /**
     *  get error TAble by tenant
     *
     * @return void
     */
    public function testGetTablesByTenantError()
    {
        $table = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/Tables/{$table}?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     *  get TAble by tenant
     *
     * @return void
     */
    public function testGetTablesByTenant()
    {
        $table = factory(Table::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
