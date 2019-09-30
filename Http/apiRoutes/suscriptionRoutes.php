<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/suscriptions'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $router->post('/', [
    'as' => 'api.suscriptions.suscription.store',
    'uses' => 'SuscriptionApiController@create',
  ]);
  $router->get('/{criteria}', [
    'as' => 'api.suscriptions.suscription.show',
    'uses' => 'SuscriptionApiController@show',
  ]);
  $router->get('/', [
    'as' => 'api.suscriptions.suscription.index',
    'uses' => 'SuscriptionApiController@index',
  ]);
  $router->put('/{criteria}', [
  'as' => 'api.suscriptions.suscription.update',
    'uses' => 'SuscriptionApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => 'api.suscriptions.suscription.delete',
    'uses' => 'SuscriptionApiController@delete',
  ]);

});
