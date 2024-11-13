<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepo)
    {
    }

    public function getList()
    {
        return $this->userRepo->getList();
    }
}
