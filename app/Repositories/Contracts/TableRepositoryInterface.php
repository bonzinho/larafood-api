<?php
namespace App\Repositories\Contracts;

interface TableRepositoryInterface{

    public function getTablesByTenantUuid(string $uuid);
    public function getTablesByTenantId(string $tenantId);
    public function getTableByUuid(string $uuid);


}
