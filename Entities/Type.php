<?php

namespace Modules\Suscriptions\Entities;

class Type
{
    const QUANTITY = 0;
    const TEXT = 1;
    const BOOLEAN = 2;


    /**
     * @var array
     */
    private $types = [];

    public function __construct()
    {
        $this->types = [
            self::QUANTITY => trans('suscriptions::types.quantity'),
            self::TEXT => trans('suscriptions::types.text'),
            self::BOOLEAN => trans('suscriptions::types.boolean'),

        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->types;
    }

    /**
     * Get the post status
     * @param $typeId
     * @return string
     */
    public function get($typeId)
    {
        if (isset($this->types[$typeId])) {
            return $this->types[$typeId];
        }

        return $this->types[self::QUANTITY];
    }
}
