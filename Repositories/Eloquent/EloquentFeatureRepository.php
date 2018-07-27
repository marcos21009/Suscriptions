<?php

namespace Modules\Suscriptions\Repositories\Eloquent;

use Modules\Suscriptions\Repositories\FeatureRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentFeatureRepository extends EloquentBaseRepository implements FeatureRepository
{
    public function whereProduct($product_id, $perPage = 15)
    {

        if (method_exists($this->model, 'translations')) {
            return $this->model->with('translations')->where('product_id',$product_id)->orderBy('created_at', 'DESC')->paginate($perPage);
        }

        return $this->model->where('product_id',$product_id)->orderBy('created_at', 'DESC')->paginate($perPage);
    }
}
