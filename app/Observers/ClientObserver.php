<?php

namespace App\Observers;

use App\Models\Client;
use Illuminate\Support\Str;

class ClientObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category  $client
     * @return void
     */
    public function creating(Client $client)
    {
        $client->uuid = Str::uuid();
    }
}
