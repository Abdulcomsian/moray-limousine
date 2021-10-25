<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = "tax";
    protected $fillable = ['id', 'tax', 'created_by', 'updated_by'];
}
