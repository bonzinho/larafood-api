<?php
namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository  implements OrderRepositoryInterface {


    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenant_id,
        string $comment = '',
        $clientId = '',
        $tableId = ''
    ){

        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' => $tenant_id,
            'clientId' => $clientId,
            'tableId' => $tableId,
            'comment' => $comment,
        ];

        $order = $this->entity->create($data);

        return $order;

    }

    public function getOrderByidentify(string $identify){
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProductsOrder(int $orderId, array $products){

        $oderProducts = [];
        $order = $this->entity->find($orderId);

       foreach($products as $product){
           $orderProducts[$product['id']] = [
               'qty' => $product['qty'],
               'price' => $product['price']
           ];
       }

        $order->products()->attach($orderProducts);

        /*foreach ($products as $product) {
            array_push($ordereProducts, [
               'order_id' => $orderId,
                'product_id' => $product['id'],
                'qty' => $product['qty'],
                'price' => $product['price'],
            ]);
        }

        DB::table('order_products')->indert($oderProducts);*/
    }

    public function getOrdersByClientId(int $idClient){
        $orders = $this->entity
            ->where('client_id', $idClient)
            ->paginate();

        return $orders;
    }



}
