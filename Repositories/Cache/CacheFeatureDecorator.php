<?php

namespace Modules\Suscriptions\Repositories\Cache;

use Modules\Suscriptions\Repositories\FeatureRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFeatureDecorator extends BaseCacheDecorator implements FeatureRepository
{
    public function __construct(FeatureRepository $feature)
    {
        parent::__construct();
        $this->entityName = 'suscriptions.features';
        $this->repository = $feature;
    }

    public function whereProduct($product_id, $perPage = 15)
    {
        return $this->remember(function () use ($product_id, $perPage) {
            return $this->repository->whereProduct($product_id, $perPage);
        });
    }
}
