<?php

namespace App\Observers;

use App\Models\Table;
use Illuminate\Support\Str;

class TableObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category  $table
     * @return void
     */
    public function creating(Table $table)
    {
        $table->uuid = Str::uuid();
    }
}
