<?php
namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface{

    public function getCategoriesByTenantUuid(string $uuid);
    public function getCategoriesByTenantId(string $tenantId);
    public function getCategoryByUrl(string $url);


}
