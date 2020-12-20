<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->identify,
            'total' => $this->total,
            'client' => $this->client_id ? new ClientResource($this->client) : '',
            'status' => $this->status,
            'date' => Carbon::make($this->created_at)->format('d-m-Y'),
            'company' => new TenantResource($this->tenant),
            'table' => $this->table_id ? new TableResource($this->table) : '',
            'products' => ProductResource::collection($this->products),
            'evaluations' => EvaluationResource::collection($this->evaluations)
        ];
    }
}