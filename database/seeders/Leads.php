<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//this must be added to use the seed.
use Illuminate\Support\Facades\DB;


class Leads extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Let's add a few leads
        DB::table('leads')->insert([
            'name' => 'Simela',
            'email' => 'simela@learnworlds.com',
            'terms' => 'yes',
        ]);
        
        DB::table('leads')->insert([
            'name' => 'Alexis',
            'email' => 'alexis@learnworlds.com',
            'terms' => 'no',
        ]);
        
        DB::table('leads')->insert([
            'name' => 'Yusuf',
            'email' => 'yusufocaliskan@gmail.com',
            'terms' => 'yes',
        ]);

        
        
    }
}
