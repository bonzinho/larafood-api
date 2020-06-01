<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'order_evaluation';

    protected $fillable = ['order_id', 'client_id', 'comment', 'stars'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function client(){
        return $this->belongsTo(client::class);
    }
}
