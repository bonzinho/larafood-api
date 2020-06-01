<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableApiController extends Controller
{
    /**
     * @var TableService
     */
    private $tableService;

    public function __construct(TableService $tableService)
    {

        $this->tableService = $tableService;
    }



    public function tablesByTenant(TenantFormRequest $request){

        $per_page = (int) $request->get('per_page', 15);
        $tables = $this->tableService->getTablesByUuid($request->token_company);
        return TableResource::collection($tables);
    }

    public function show(TenantFormRequest $request, $identify){
        if(!$tables = $this->tableService->getTableByUuid($identify)){
            return response()->json(['message' => 'Mesa inválida'], 404);
        }


        return new TableResource($tables);
    }
}
