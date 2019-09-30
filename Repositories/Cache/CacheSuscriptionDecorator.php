<?php

namespace Modules\Suscriptions\Repositories\Cache;

use Modules\Suscriptions\Repositories\SuscriptionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSuscriptionDecorator extends BaseCacheDecorator implements SuscriptionRepository
{
    public function __construct(SuscriptionRepository $suscription)
    {
        parent::__construct();
        $this->entityName = 'suscriptions.suscriptions';
        $this->repository = $suscription;
    }
}
