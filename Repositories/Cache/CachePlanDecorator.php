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
}
