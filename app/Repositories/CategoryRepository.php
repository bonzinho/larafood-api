<?php
namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository  implements CategoryRepositoryInterface {


    protected $table;

    public function __construct()
    {
        $this->table = 'categories';
    }


    public function getCategoriesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('*')
            ->get();

    }

    public function getCategoriesByTenantId(string $tenantId)
    {
        return DB::table($this->table)
            ->where('tenant_id', $tenantId)
            ->get();

    }

    public function getCategoryByUrl(string $url){
        return DB::table($this->table)
            ->where('url', $url)
            ->first();
    }
}
