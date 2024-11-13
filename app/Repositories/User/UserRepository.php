<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return $this->model;
    }

    public function getList($columns = ['*'])
    {
        dd("DSA");
    }
}
