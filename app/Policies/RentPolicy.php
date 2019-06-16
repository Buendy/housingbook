<?php

namespace App\Policies;

use App\Apartment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RentPolicy
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

    public function rent(User $user, Apartment $apartment)
    {
        return $user->id !== $apartment->user->id;
    }
}
