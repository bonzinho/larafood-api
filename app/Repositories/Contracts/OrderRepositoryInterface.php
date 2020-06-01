<?php
namespace App\Repositories\Contracts;

interface OrderRepositoryInterface{

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        string $comment = '',
        $clientId = '',
        $tableId = ','
    );

    public function getOrderByidentify(string $identify);
    public function registerProductsOrder(int $orderId, array $products);
    public function getOrdersByClientId(int $idClient);

}
