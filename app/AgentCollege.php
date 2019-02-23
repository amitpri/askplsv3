<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentCollege extends Model
{
    protected $table = 'colleges';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
