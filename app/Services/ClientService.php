<?php

namespace  App\Services;



use App\Repositories\ClientRepository;
use Illuminate\Support\Str;

class ClientService{

    protected $clientRepository;

    public function __construct(ClientRepository $repository)
    {
        $this->clientRepository = $repository;
    }

    public function createNewClient(array $data){
        return $this->clientRepository->createNewClient($data);
    }








}
