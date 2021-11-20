<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
