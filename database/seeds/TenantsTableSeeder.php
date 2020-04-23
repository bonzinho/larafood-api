<?php

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = \App\Models\Plan::first();

        $plan->tenants()->create([
            'nif' => '240600070',
            'name' => 'Flor de Avilho',
            'url' => 'flor-de-avilho',
            'email' => 'geral@flordeavilho.com',
        ]);
    }
}
