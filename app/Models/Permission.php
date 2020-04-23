<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name',  'description'];

    public function search(String $filter = null){
        $results = $this
            ->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate();
        return $results;
    }

    /*
     * Get Profiles
     */

    public function profiles(){
        return $this->belongsToMany(Profile::class);
    }

    /*
     * Get Roles
     */

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
