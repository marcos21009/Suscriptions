<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/suscriptions'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $router->post('/', [
    'as' => 'api.suscriptions.suscription.store',
    'uses' => 'SuscriptionApiController@create',
    'middleware' => ['auth:api']
  ]);
  $router->get('/{criteria}', [
    'as' => 'api.suscriptions.suscription.show',
    'uses' => 'SuscriptionApiController@show',
    'middleware' => ['auth:api']
  ]);
  $router->get('/', [
    'as' => 'api.suscriptions.suscription.index',
    'uses' => 'SuscriptionApiController@index',
    'middleware' => ['auth:api']
  ]);
  $router->put('/{criteria}', [
  'as' => 'api.suscriptions.suscription.update',
    'uses' => 'SuscriptionApiController@update',
    'middleware' => ['auth:api']
  ]);
  $router->delete('/{criteria}', [
    'as' => 'api.suscriptions.suscription.delete',
    'uses' => 'SuscriptionApiController@delete',
    'middleware' => ['auth:api']
  ]);

});
