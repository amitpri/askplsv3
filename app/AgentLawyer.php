<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentLawyer extends Model
{
    protected $table = 'lawyers';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
