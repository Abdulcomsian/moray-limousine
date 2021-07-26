<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected  $fillable = ['first_name','last_name','email','cellno','comment'];
}
