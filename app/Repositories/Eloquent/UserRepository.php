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

    public function getUserByEmail(string $email): ?User
    {
        return $this->model
            ->select(
                "id",
                "email",
                "email_verified_at",
                "created_at",
                "updated_at"
            )
            ->where([
                "email" => $email,
            ])
            ->first();
    }
}
