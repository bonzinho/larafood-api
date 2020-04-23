<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = \App\Models\Tenant::first();

        $tenant->users()->create([
            'name' => 'Vitor Bonzinho',
            'email' => 'bonzinho@fe.up.pt',
            'password' => bcrypt('secret')
        ]);
    }
}
