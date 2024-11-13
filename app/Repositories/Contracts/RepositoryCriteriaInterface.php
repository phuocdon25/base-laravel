<?php

namespace App\Repositories\Contracts;

/**
 * Interface RepositoryCriteriaInterface
 */
interface RepositoryCriteriaInterface
{
    /**
     * @param  bool  $status
     * @return $this
     */
    public function skipCriteria($status = true);

    /**
     * @return mixed
     */
    public function getCriteria();

    /**
     * @return $this
     */
    public function getByCriteria(CriteriaInterface $criteria);

    /**
     * @return $this
     */
    public function pushCriteria(CriteriaInterface $criteria);

    /**
     * @return $this
     */
    public function applyCriteria();
}
