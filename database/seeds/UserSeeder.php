<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dd(App\User::all());
        App\User::create([
            'first_name' => 'Admin', 
            'last_name' => 'Adminskiy',
            'roles_id' => 1, 
            'country_id' => 30,
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        

        for ($i=0; $i < rand(400, 700); $i++) { 
            App\User::create([
            'first_name' => 'User '.$i, 
            'last_name' => 'User',
            'roles_id' => 2, 
            'country_id' => rand(1,30),
            'email' => 'user'.$i.'@admin.com',
            'password' => bcrypt('admin'),
        ]);
        }
    }
}
