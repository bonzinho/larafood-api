<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;

Trait TenantTrait {

    // Usar o observer criado dentro da pasta tenants
    protected static function boot(){

        parent::boot();

        static::observe(new TenantObserver);
        static::addGlobalScope(new TenantScope);
    }

}
