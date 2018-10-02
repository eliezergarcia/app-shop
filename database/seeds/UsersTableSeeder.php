<?php

use App\User;
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
        User::create([
        	'name' => 'Eliezer Hernández',
            'email' => '2dcc.eh@gmail.com',
            'password' => bcrypt('123412'),
            'admin' => true
        ]);
    }
}
