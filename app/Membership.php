<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
   protected $table = 'users';

   public function topicable(){

        return $this->morphTo();
    }
}
