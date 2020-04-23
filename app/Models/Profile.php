<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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
     * Permissions not linked with this profile
     */
    public function permissionsAvailable($filter = null){
        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_id');
            $query->from('permission_profile');
            $query->whereRaw("profile_id={$this->id}");
        })
            ->where(function ($queryfilter) use ($filter){
                if($filter)
                    $queryfilter->where('permissions.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

            return $permissions;
    }

    /*
     * Get Permissions
     */

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class);
    }
}
