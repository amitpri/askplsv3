<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentRestaurant extends Model
{
    protected $table = 'restaurants';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
