<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    protected $fillable = ['name', 'url', 'price', 'description'];

    public function search(String $filter = null){
        $results = $this
                ->where('name', 'LIKE', "%{$filter}%")
                ->orWhere('description', 'LIKE', "%{$filter}%")
                ->paginate();
        return $results;
    }

    /*
     * Profile not linked with this plan
     */
    public function profilesAvailable($filter = null){
        $profiles = Profile::whereNotIn('id', function($query){
            $query->select('id');
            $query->from('plan_profile');
            $query->whereRaw("plan_id={$this->id}");
        })
            ->where(function ($queryfilter) use ($filter){
                if($filter)
                    $queryfilter->where('name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $profiles;
    }


    public function details(){
        return $this->hasMany(DetailPlan::Class);
    }

    public function profiles(){
        return $this->belongsToMany(Profile::Class);
    }

    public function tenants(){
        return $this->hasMany(Tenant::class);
    }

}
