<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' =>	$this->name,
            'description' =>	$this->description,
            'flag' =>	$this->flag,
            'price' =>	$this->price,
            'image' => url('storage/'. $this->image),
            'date_created' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
