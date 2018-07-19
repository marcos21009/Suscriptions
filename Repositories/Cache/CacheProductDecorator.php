<?php

namespace Modules\Suscriptions\Repositories\Cache;

use Modules\Suscriptions\Repositories\ProductRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductDecorator extends BaseCacheDecorator implements ProductRepository
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct();
        $this->entityName = 'suscriptions.products';
        $this->repository = $product;
    }
}
