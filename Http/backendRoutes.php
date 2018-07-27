<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->group(['prefix' => '/suscriptions'], function (Router $router) {

    $router->group(['prefix' => '/products'], function (Router $router) {

        $router->bind('product', function ($id) {
            return app('Modules\Suscriptions\Repositories\ProductRepository')->find($id);
        });
        $router->get('/', [
            'as' => 'admin.suscriptions.product.index',
            'uses' => 'ProductController@index',
            'middleware' => 'can:suscriptions.products.index'
        ]);
        $router->get('/create', [
            'as' => 'admin.suscriptions.product.create',
            'uses' => 'ProductController@create',
            'middleware' => 'can:suscriptions.products.create'
        ]);
        $router->post('/', [
            'as' => 'admin.suscriptions.product.store',
            'uses' => 'ProductController@store',
            'middleware' => 'can:suscriptions.products.create'
        ]);
        $router->get('/{product}/edit', [
            'as' => 'admin.suscriptions.product.edit',
            'uses' => 'ProductController@edit',
            'middleware' => 'can:suscriptions.products.edit'
        ]);
        $router->put('/{product}', [
            'as' => 'admin.suscriptions.product.update',
            'uses' => 'ProductController@update',
            'middleware' => 'can:suscriptions.products.edit'
        ]);
        $router->delete('/{product}', [
            'as' => 'admin.suscriptions.product.destroy',
            'uses' => 'ProductController@destroy',
            'middleware' => 'can:suscriptions.products.destroy'
        ]);
    });


    $router->group(['prefix' => '/{product_id}/plans'], function (Router $router) {

        $router->bind('plans', function ($id) {
            return app('Modules\Suscriptions\Repositories\PlanRepository')->find($id);
        });

        $router->get('/', [
            'as' => 'admin.suscriptions.plan.index',
            'uses' => 'PlanController@index',
            'middleware' => 'can:suscriptions.plans.index'
        ]);
        $router->get('/create', [
            'as' => 'admin.suscriptions.plan.create',
            'uses' => 'PlanController@create',
            'middleware' => 'can:suscriptions.plans.create'
        ]);
        $router->post('/', [
            'as' => 'admin.suscriptions.plan.store',
            'uses' => 'PlanController@store',
            'middleware' => 'can:suscriptions.plans.create'
        ]);
        $router->get('/{plan}/edit', [
            'as' => 'admin.suscriptions.plan.edit',
            'uses' => 'PlanController@edit',
            'middleware' => 'can:suscriptions.plans.edit'
        ]);
        $router->put('/{plan}', [
            'as' => 'admin.suscriptions.plan.update',
            'uses' => 'PlanController@update',
            'middleware' => 'can:suscriptions.plans.edit'
        ]);
        $router->delete('/{plan}', [
            'as' => 'admin.suscriptions.plan.destroy',
            'uses' => 'PlanController@destroy',
            'middleware' => 'can:suscriptions.plans.destroy'
        ]);
    });

    $router->group(['prefix' => '/{product_id}/features'], function (Router $router) {

        $router->bind('feature', function ($id) {
            return app('Modules\Suscriptions\Repositories\FeatureRepository')->find($id);
        });
        $router->get('/', [
            'as' => 'admin.suscriptions.feature.index',
            'uses' => 'FeatureController@index',
            'middleware' => 'can:suscriptions.features.index'
        ]);
        $router->get('/create', [
            'as' => 'admin.suscriptions.feature.create',
            'uses' => 'FeatureController@create',
            'middleware' => 'can:suscriptions.features.create'
        ]);
        $router->post('/', [
            'as' => 'admin.suscriptions.feature.store',
            'uses' => 'FeatureController@store',
            'middleware' => 'can:suscriptions.features.create'
        ]);
        $router->get('/{feature}/edit', [
            'as' => 'admin.suscriptions.feature.edit',
            'uses' => 'FeatureController@edit',
            'middleware' => 'can:suscriptions.features.edit'
        ]);
        $router->put('/{feature}', [
            'as' => 'admin.suscriptions.feature.update',
            'uses' => 'FeatureController@update',
            'middleware' => 'can:suscriptions.features.edit'
        ]);
        $router->delete('/{feature}', [
            'as' => 'admin.suscriptions.feature.destroy',
            'uses' => 'FeatureController@destroy',
            'middleware' => 'can:suscriptions.features.destroy'
        ]);

    });

    $router->group(['prefix' => '/suscription'], function (Router $router) {


        $router->bind('suscription', function ($id) {
            return app('Modules\Suscriptions\Repositories\SuscriptionRepository')->find($id);
        });
        $router->get('/', [
            'as' => 'admin.suscriptions.suscription.index',
            'uses' => 'SuscriptionController@index',
            'middleware' => 'can:suscriptions.suscriptions.index'
        ]);
        $router->get('/create', [
            'as' => 'admin.suscriptions.suscription.create',
            'uses' => 'SuscriptionController@create',
            'middleware' => 'can:suscriptions.suscriptions.create'
        ]);
        $router->post('/', [
            'as' => 'admin.suscriptions.suscription.store',
            'uses' => 'SuscriptionController@store',
            'middleware' => 'can:suscriptions.suscriptions.create'
        ]);
        $router->get('/{suscription}/edit', [
            'as' => 'admin.suscriptions.suscription.edit',
            'uses' => 'SuscriptionController@edit',
            'middleware' => 'can:suscriptions.suscriptions.edit'
        ]);
        $router->put('/{suscription}', [
            'as' => 'admin.suscriptions.suscription.update',
            'uses' => 'SuscriptionController@update',
            'middleware' => 'can:suscriptions.suscriptions.edit'
        ]);
        $router->delete('/{suscription}', [
            'as' => 'admin.suscriptions.suscription.destroy',
            'uses' => 'SuscriptionController@destroy',
            'middleware' => 'can:suscriptions.suscriptions.destroy'
        ]);
// append


    });
});
