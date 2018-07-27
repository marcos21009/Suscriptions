<?php

namespace Modules\Suscriptions\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface FeatureRepository extends BaseRepository
{


    public function whereProduct($product_id,$perPage = 15);
}
