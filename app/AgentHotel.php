<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentHotel extends Model
{
    protected $table = 'hotels';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
