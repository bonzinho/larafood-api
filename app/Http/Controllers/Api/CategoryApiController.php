<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {

        $this->categoryService = $categoryService;
    }



    public function categoriesByTenant(TenantFormRequest $request){


        /* if(!$request->token_company){
            return response()->json(['message' => 'uuid not Found'], 404)
        }*/

        $per_page = (int) $request->get('per_page', 15);
        $categories = $this->categoryService->getCategoriesByUuid($request->token_company);
        return CategoryResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $identify){
        if(!$categories = $this->categoryService->getCategoryByUuid($identify)){
            return response()->json(['message' => 'Empresa inválida'], 404);
        }


        return new CategoryResource($categories);
    }

}
