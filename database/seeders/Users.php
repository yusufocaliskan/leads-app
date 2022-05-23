<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


//this must be added to use the seed.
use Illuminate\Support\Facades\DB;


class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Let's add a few leads
        DB::table('users')->insert([
            'email' => 'usib@gmail.com',
            'password' => Hash::make('2121'),
        ]);
       
        
        
    }
}
