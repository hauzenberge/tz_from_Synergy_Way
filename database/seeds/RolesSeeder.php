<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Roles::create([
            'name' => 'Admin',
        ]);
        App\Roles::create([
            'name' => 'User',
        ]);
    }
}
