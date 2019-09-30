<?php

namespace Modules\Suscriptions\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Suscriptions\Entities\Status;

class PlanPresenter extends Presenter
{
    /**
     * @var \Modules\Suscriptions\Entities\Status
     */
    protected $status;
    /**
     * @var \Modules\Suscriptions\Repositories\PlanRepository
     */
    private $plan;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->plan = app('Modules\Suscriptions\Repositories\PlanRepository');
        $this->status = app('Modules\Suscriptions\Entities\Status');
    }

    /**
     * Get the post status
     * @return string
     */
    public function status()
    {
        return $this->status->get($this->entity->status);
    }
    /**
     * Get the bill cycle
     * @return string
     */
    public function billCycle()
    {
        $billCycle="";
        if($this->entity->bill_cycle=="week"){
          $billCycle=trans("suscriptions::bill_cycles.cycles.weeks");
        }else if($this->entity->bill_cycle=="month"){
          $billCycle=trans("suscriptions::bill_cycles.cycles.months");
        }else if($this->entity->bill_cycle=="year"){
          $billCycle=trans("suscriptions::bill_cycles.cycles.years");
        }
        return $billCycle;
    }

    /**
     * Getting the label class for the appropriate status
     * @return string
     */
    public function statusLabelClass()
    {
        switch ($this->entity->status) {
            case Status::INACTIVE:
                return 'bg-red';
                break;
            case Status::ACTIVE:
                return 'bg-green';
                break;
            default:
                return 'bg-red';
                break;
        }
    }
}
