<?php

namespace Modules\Suscriptions\Entities;

class Status
{
    const INACTIVE = 0;
    const ACTIVE = 1;


    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::INACTIVE => trans('suscriptions::status.inactive'),
            self::ACTIVE => trans('suscriptions::status.active'),

        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->statuses;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->statuses[$statusId])) {
            return $this->statuses[$statusId];
        }

        return $this->statuses[self::INACTIVE];
    }
}
