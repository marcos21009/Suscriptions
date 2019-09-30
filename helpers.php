<?php

use Modules\Suscriptions\Entities\Status;
use Modules\Suscriptions\Entities\Type;

if (!function_exists('suscriptions__getStatus')) {

    function suscriptions__getStatus()
    {
        $status = new Status();
        return $status;
    }
}

if (!function_exists('suscriptions__getType')) {

    function suscriptions__getType()
    {
        $status = new Type();
        return $status;
    }
}


 function formatDate($date,$format="%d %b %Y"){
    strftime($format, strtotime($date));
}
