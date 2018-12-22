<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShowTopic extends Model
{
    protected $table = 'topics';

    public function user()
    {

    	return $this->belongsTo('App\User');

    }
}
