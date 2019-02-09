<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
   public function faqcategory()
    {

        return $this->belongsTo('App\FaqCategory', 'category');

    } 
}
