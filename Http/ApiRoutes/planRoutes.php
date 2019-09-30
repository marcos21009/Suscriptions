<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/plans'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $router->post('/', [
    'as' => 'api.suscriptions.plans.store',
    'uses' => 'PlanApiController@create',
  ]);
  $router->get('/{criteria}', [
    'as' => 'api.suscriptions.plans.show',
    'uses' => 'PlanApiController@show',
  ]);
  $router->get('/', [
    'as' => 'api.suscriptions.plans.index',
    'uses' => 'PlanApiController@index',
  ]);
  $router->put('/{criteria}', [
  'as' => 'api.suscriptions.plans.update',
    'uses' => 'PlanApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => 'api.suscriptions.plans.delete',
    'uses' => 'PlanApiController@delete',
  ]);

});
