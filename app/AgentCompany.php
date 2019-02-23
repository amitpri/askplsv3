<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentCompany extends Model
{
    protected $table = 'companies';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
