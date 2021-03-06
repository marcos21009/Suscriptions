<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/products'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $router->post('/', [
    'as' => 'api.suscriptions.products.store',
    'uses' => 'ProductApiController@create',
  ]);
  $router->get('/{criteria}', [
    'as' => 'api.suscriptions.products.show',
    'uses' => 'ProductApiController@show',
  ]);
  $router->get('/', [
    'as' => 'api.suscriptions.products.index',
    'uses' => 'ProductApiController@index',
  ]);
  $router->put('/{criteria}', [
  'as' => 'api.suscriptions.products.update',
    'uses' => 'ProductApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => 'api.suscriptions.products.delete',
    'uses' => 'ProductApiController@delete',
  ]);

});
