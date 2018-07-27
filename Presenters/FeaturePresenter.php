<?php

namespace Modules\Suscriptions\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Suscriptions\Entities\Status;

class FeaturePresenter extends Presenter
{
    /**
     * @var \Modules\Suscriptions\Entities\Status
     */
    protected $status;
    /**
     * @var \Modules\Suscriptions\Entities\Status
     */
    protected $type;
    /**
     * @var \Modules\Suscriptions\Repositories\FeatureRepository
     */
    private $feature;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->feature = app('Modules\Suscriptions\Repositories\FeatureRepository');
        $this->status = app('Modules\Suscriptions\Entities\Status');
        $this->type= app('Modules\Suscriptions\Entities\Type');
    }


    public function status()
    {
        return $this->status->get($this->entity->status);

    }
    public function type()
    {
        return $this->type->get($this->entity->type);

    }


    public function statusLabelClass()
    {
        switch ($this->entity->status) {
            case Status::INACTIVE:
                return 'bg-red';
                break;
            /*case Status::PENDING:
                return 'bg-orange';
                break;*/
            case Status::ACTIVE:
                return 'bg-green';
                break;
           /* case Status::UNPUBLISHED:
                return 'bg-purple';
                break;
           */
            default:
                return 'bg-red';
                break;
        }
    }
}
