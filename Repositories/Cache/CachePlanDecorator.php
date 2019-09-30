<?php

namespace Modules\Suscriptions\Repositories\Cache;

use Modules\Suscriptions\Repositories\PlanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePlanDecorator extends BaseCacheDecorator implements PlanRepository
{
    public function __construct(PlanRepository $plan)
    {
        parent::__construct();
        $this->entityName = 'suscriptions.plans';
        $this->repository = $plan;
    }


    /**
     * where by product
     * @param $product_id
     * @param int $perPage
     * @return mixed
     * @internal param $paginate
     */
    public function whereProduct($product_id, $perPage = 15)
    {
        return $this->remember(function () use ($product_id, $perPage) {
            return $this->repository->whereProduct($product_id, $perPage);
        });
    }
}
