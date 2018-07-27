<?php

namespace Modules\Suscriptions\Repositories\Eloquent;

use Modules\Suscriptions\Repositories\PlanRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPlanRepository extends EloquentBaseRepository implements PlanRepository
{
    /**
     * where by product
     * @param $produc_id
     * @param int $perPage
     * @return mixed
     */
    public function whereProduct($product_id,$perPage = 15)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->with('translations')->where('product_id',$product_id)->orderBy('created_at', 'DESC')->paginate($perPage);
        }

        return $this->model->where('product_id',$product_id)->orderBy('created_at', 'DESC')->paginate($perPage);
    }
}
