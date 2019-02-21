<?php

namespace App\Policies;
use Auth;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MailLogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
