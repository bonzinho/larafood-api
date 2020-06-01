<?php

namespace  App\Services;


use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Str;

class TableService{

    /**
     * @var TableRepositoryInterface
     */
    private $tableRepository;
    /**
     * @var TenantRepositoryInterface
     */
    private $tenantRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository, TableRepositoryInterface $tableRepository)
    {
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(string $uuid){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);
        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByUuid(string $uuid){
        return $this->tableRepository->getTableByUuid($uuid);
    }





}
