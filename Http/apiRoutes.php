<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/suscriptions/v1'/*,'middleware' => ['auth:api']*/], function (Router $router) {
//======   Product
  require('ApiRoutes/productRoutes.php');
//======   Plan
  require('ApiRoutes/planRoutes.php');
//======   Feature
  require('ApiRoutes/featureRoutes.php');
//======   Suscription
  require('ApiRoutes/suscriptionRoutes.php');
});
