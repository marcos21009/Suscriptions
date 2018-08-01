<?php

namespace Modules\Suscriptions\Repositories\Cache;

use Modules\Suscriptions\Repositories\PlanFeatureRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePlanFeatureDecorator extends BaseCacheDecorator implements PlanFeatureRepository
{
    public function __construct(PlanFeatureRepository $planFeature)
    {
        parent::__construct();
        $this->entityName = 'suscriptions.planfeature';
        $this->repository = $planFeature;
    }


}
