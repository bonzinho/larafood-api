<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'nif',
        'name',
        'url',
        'email',
        'logo',
        'subscription',
        'expires_at',
        'subscription_id',
        'subscription_active',
        'subscription_suspendend'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

}
