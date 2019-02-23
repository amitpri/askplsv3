<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AgentFitnessCenter extends Model
{
    protected $table = 'fitness_centers';

    public function agent()
    {

        return $this->belongsTo('App\Agent', 'user_id');

    } 
}
