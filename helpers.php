<?php


 function formatDate($date,$format="%d %b %Y"){
    strftime($format, strtotime($date));
}