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
        $manager_tenant = app(ManagerTenant::class);
        $identify = $manager_tenant->getTenantIdentify();
        if($identify)
            $model->tenant_id = $identify;
    }
}
