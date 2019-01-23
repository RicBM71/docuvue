<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        dd($user);
        if($user->hasRole('Admin')){
            return true;
        }
        return false;
    }
    }
