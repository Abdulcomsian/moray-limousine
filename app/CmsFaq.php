<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsFaq extends Model
{
    protected $fillable = ['title','title2','faq_question','faq_answer'];
}
