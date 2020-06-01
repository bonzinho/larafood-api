<?php

namespace  App\Services;


use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EvaluationService{


    /**
     * @var EvaluationRepositoryInterface
     */
    private $evaluationRepository;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    public function __construct(EvaluationRepositoryInterface $evaluationRepository, OrderRepositoryInterface $orderRepository)
    {

        $this->evaluationRepository = $evaluationRepository;
        $this->orderRepository = $orderRepository;
    }

    public function createNewEvaluation(string $identifyOrder, array $evaluation = [])
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByidentify($identifyOrder);


        return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId, $evaluation);

    }

    private function getIdClient(){
        return auth()->user()->id;
    }







}
