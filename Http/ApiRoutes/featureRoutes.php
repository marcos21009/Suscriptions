<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/features'/*,'middleware' => ['auth:api']*/], function (Router $router) {
  $router->post('/', [
    'as' => 'api.suscriptions.features.store',
    'uses' => 'FeatureApiController@create',
  ]);
  $router->get('/{criteria}', [
    'as' => 'api.suscriptions.features.show',
    'uses' => 'FeatureApiController@show',
  ]);
  $router->get('/', [
    'as' => 'api.suscriptions.features.index',
    'uses' => 'FeatureApiController@index',
  ]);
  $router->put('/{criteria}', [
  'as' => 'api.suscriptions.features.update',
    'uses' => 'FeatureApiController@update',
  ]);
  $router->delete('/{criteria}', [
    'as' => 'api.suscriptions.features.delete',
    'uses' => 'FeatureApiController@delete',
  ]);

});
