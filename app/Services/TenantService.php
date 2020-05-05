<?php

namespace  App\Services;

use App\Models\Plan;
use App\Models\Tenant;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Str;

class TenantService{
    /**
     * @var Plan
     */
    private $plan;
    /**
     * @var array
     */
    private $data;
    /**
     * @var TenantRepositoryInterface
     */
    private $repository;

    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTenants(int $per_page){
        return $this->repository->getAllTenants($per_page);
    }

    public function getTenantByUuid(string  $uuid){
        return $this->repository->getTenantByUuid($uuid);
    }


    public function make(Plan $plan, array $data){

        $this->plan = $plan;
        $this->data = $data;
        $tenant = $this->storeTenant();
        return $this->storeUser($tenant);
    }

    public function storeTenant(){
        return $this->plan->tenants()->create([
            'nif' => $this->data['nif'],
            'name' => $this->data['empresa'],
            'email' => $this->data['email'],

            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function storeUser(Tenant $tenant){
        return $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password'])
        ]);
    }
}
