<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;

    protected $fillable = ['name', 'flag', 'price', 'description', 'image'];


    /*
     * Categories not linked with this profile
     */
    public function categoriesAvailable($filter = null){
        $categories = Category::whereNotIn('id', function($query){
            $query->select('category_id');
            $query->from('category_product');
            $query->whereRaw("product_id={$this->id}");
        })
            ->where(function ($queryfilter) use ($filter){
                if($filter)
                    $queryfilter->where('categories.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $categories;
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
