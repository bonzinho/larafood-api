<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductApiController constructor.
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productsByTenant(TenantFormRequest $request){

        $products = $this->productService->getProductsByTenantUuid(
            $request->token_company,
            $request->get('categories', [])
        );
        return ProductResource::collection($products);

    }

    public function show(TenantFormRequest $request, $flag){

        if(!$product = $this->productService->getProductByFlag($flag)){
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }


        return new ProductResource($product);

    }
}
