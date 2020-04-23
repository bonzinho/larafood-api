<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver{

    /**
     *
     *
     * @param  Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        $model->tenant_id = app(ManagerTenant::class)->getTenantIdentify();
    }
}
