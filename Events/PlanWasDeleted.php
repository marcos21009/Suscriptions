<?php

namespace Modules\Suscriptions\Events;

use Modules\Suscriptions\Entities\Plan;
use Modules\Media\Contracts\DeletingMedia;

class PlanWasDeleted implements  DeletingMedia
{


    private $plan;
     /**
     * Create a new event instance.
     *
     * @param $plan
     */
    public function __construct(Plan $plan)
    {
         $this->plan=$plan;
    }

    public function getEntityId()
    {
        return $this->plan->id;
    }

    public function getClassName()
    {
        return get_class($this->plan);
    }
}
