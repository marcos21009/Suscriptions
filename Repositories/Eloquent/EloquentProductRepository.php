<?php

namespace Modules\Suscriptions\Repositories\Eloquent;

use Modules\Suscriptions\Events\ProductWasCreated;
use Modules\Suscriptions\Events\ProductWasDeleted;
use Modules\Suscriptions\Repositories\ProductRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
{


    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $product = $this->model->create($data);
        event(new ProductWasCreated($product, $data));
        return $product;
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    public function update($model, $data)
    {
        $model->update($data);
        event(new ProductWasCreated($model, $data));
        return $model;
    }

    /**
     * @param $model
     * @return mixed
     */
    public function destroy($model)
    {
        event(new ProductWasDeleted($model));

        return $model->delete();
    }

}
