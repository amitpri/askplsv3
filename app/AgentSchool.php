<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentSchool extends Model
{
    protected $table = 'schools';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
