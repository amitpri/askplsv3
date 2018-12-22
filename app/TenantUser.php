<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantUser extends Model
{
    protected $fillable = [
        'user_id', 'tenant_id', 'admin',  'status'
    ];
}
