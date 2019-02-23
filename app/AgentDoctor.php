<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentDoctor extends Model
{
    protected $table = 'doctors';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
