<?php

namespace  App\Services;


use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Str;

class ProductService{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var TenantRepositoryInterface
     */
    private $tenantRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository, ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getProductsByTenantUuid(string $uuid, array $categories){
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);
        return $this->productRepository->getProductsByTenantId($tenant->id, $categories);
    }

    public function getProductByUuid(string $uuid){
        return $this->productRepository->getProductByUuid($uuid);
    }







}
