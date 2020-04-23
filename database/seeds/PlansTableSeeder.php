<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Plan::create([
            'name' => "Gratuito",
            'url' => "gratuito",
            'price' => 0,
            'description' => "Plano Gratuito"
        ]);
    }
}
