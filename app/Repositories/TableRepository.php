<?php
namespace App\Repositories;

use App\Models\Table;
use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TableRepository  implements TableRepositoryInterface {


    protected $table;

    public function __construct()
    {
        $this->table = 'tables';
    }


    public function getTablesByTenantUuid(string $uuid)
    {
        return DB::table($this->table)->join('tenants', 'tenants.id', '=', 'tables.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('*')
            ->get();

    }

    public function getTablesByTenantId(string $tenantId)
    {
        return DB::table($this->table)
            ->where('tenant_id', $tenantId)
            ->get();

    }

    public function getTableById(int $id){
        return DB::table($this->table)
            ->where('id', $id)
            ->first();
    }
}
