<?php

namespace App\Repositories\Contracts;

interface CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}
