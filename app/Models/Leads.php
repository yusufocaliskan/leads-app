<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

//We use Jensseger's Mongo model 
//instead using the default one
use Jenssegers\Mongodb\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    //Define the collection
    protected $collection = 'leads';

    //override the database

}
