<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/suscriptions'], function (Router $router) {
    $router->bind('product', function ($id) {
        return app('Modules\Suscriptions\Repositories\ProductRepository')->find($id);
    });
    $router->get('products', [
        'as' => 'admin.suscriptions.product.index',
        'uses' => 'ProductController@index',
        'middleware' => 'can:suscriptions.products.index'
    ]);
    $router->get('products/create', [
        'as' => 'admin.suscriptions.product.create',
        'uses' => 'ProductController@create',
        'middleware' => 'can:suscriptions.products.create'
    ]);
    $router->post('products', [
        'as' => 'admin.suscriptions.product.store',
        'uses' => 'ProductController@store',
        'middleware' => 'can:suscriptions.products.create'
    ]);
    $router->get('products/{product}/edit', [
        'as' => 'admin.suscriptions.product.edit',
        'uses' => 'ProductController@edit',
        'middleware' => 'can:suscriptions.products.edit'
    ]);
    $router->put('products/{product}', [
        'as' => 'admin.suscriptions.product.update',
        'uses' => 'ProductController@update',
        'middleware' => 'can:suscriptions.products.edit'
    ]);
    $router->delete('products/{product}', [
        'as' => 'admin.suscriptions.product.destroy',
        'uses' => 'ProductController@destroy',
        'middleware' => 'can:suscriptions.products.destroy'
    ]);
    $router->bind('plan', function ($id) {
        return app('Modules\Suscriptions\Repositories\PlanRepository')->find($id);
    });
    $router->get('plans', [
        'as' => 'admin.suscriptions.plan.index',
        'uses' => 'PlanController@index',
        'middleware' => 'can:suscriptions.plans.index'
    ]);
    $router->get('plans/create', [
        'as' => 'admin.suscriptions.plan.create',
        'uses' => 'PlanController@create',
        'middleware' => 'can:suscriptions.plans.create'
    ]);
    $router->post('plans', [
        'as' => 'admin.suscriptions.plan.store',
        'uses' => 'PlanController@store',
        'middleware' => 'can:suscriptions.plans.create'
    ]);
    $router->get('plans/{plan}/edit', [
        'as' => 'admin.suscriptions.plan.edit',
        'uses' => 'PlanController@edit',
        'middleware' => 'can:suscriptions.plans.edit'
    ]);
    $router->put('plans/{plan}', [
        'as' => 'admin.suscriptions.plan.update',
        'uses' => 'PlanController@update',
        'middleware' => 'can:suscriptions.plans.edit'
    ]);
    $router->delete('plans/{plan}', [
        'as' => 'admin.suscriptions.plan.destroy',
        'uses' => 'PlanController@destroy',
        'middleware' => 'can:suscriptions.plans.destroy'
    ]);
    $router->bind('feature', function ($id) {
        return app('Modules\Suscriptions\Repositories\FeatureRepository')->find($id);
    });
    $router->get('features', [
        'as' => 'admin.suscriptions.feature.index',
        'uses' => 'FeatureController@index',
        'middleware' => 'can:suscriptions.features.index'
    ]);
    $router->get('features/create', [
        'as' => 'admin.suscriptions.feature.create',
        'uses' => 'FeatureController@create',
        'middleware' => 'can:suscriptions.features.create'
    ]);
    $router->post('features', [
        'as' => 'admin.suscriptions.feature.store',
        'uses' => 'FeatureController@store',
        'middleware' => 'can:suscriptions.features.create'
    ]);
    $router->get('features/{feature}/edit', [
        'as' => 'admin.suscriptions.feature.edit',
        'uses' => 'FeatureController@edit',
        'middleware' => 'can:suscriptions.features.edit'
    ]);
    $router->put('features/{feature}', [
        'as' => 'admin.suscriptions.feature.update',
        'uses' => 'FeatureController@update',
        'middleware' => 'can:suscriptions.features.edit'
    ]);
    $router->delete('features/{feature}', [
        'as' => 'admin.suscriptions.feature.destroy',
        'uses' => 'FeatureController@destroy',
        'middleware' => 'can:suscriptions.features.destroy'
    ]);
    $router->bind('suscription', function ($id) {
        return app('Modules\Suscriptions\Repositories\SuscriptionRepository')->find($id);
    });
    $router->get('suscriptions', [
        'as' => 'admin.suscriptions.suscription.index',
        'uses' => 'SuscriptionController@index',
        'middleware' => 'can:suscriptions.suscriptions.index'
    ]);
    $router->get('suscriptions/create', [
        'as' => 'admin.suscriptions.suscription.create',
        'uses' => 'SuscriptionController@create',
        'middleware' => 'can:suscriptions.suscriptions.create'
    ]);
    $router->post('suscriptions', [
        'as' => 'admin.suscriptions.suscription.store',
        'uses' => 'SuscriptionController@store',
        'middleware' => 'can:suscriptions.suscriptions.create'
    ]);
    $router->get('suscriptions/{suscription}/edit', [
        'as' => 'admin.suscriptions.suscription.edit',
        'uses' => 'SuscriptionController@edit',
        'middleware' => 'can:suscriptions.suscriptions.edit'
    ]);
    $router->put('suscriptions/{suscription}', [
        'as' => 'admin.suscriptions.suscription.update',
        'uses' => 'SuscriptionController@update',
        'middleware' => 'can:suscriptions.suscriptions.edit'
    ]);
    $router->delete('suscriptions/{suscription}', [
        'as' => 'admin.suscriptions.suscription.destroy',
        'uses' => 'SuscriptionController@destroy',
        'middleware' => 'can:suscriptions.suscriptions.destroy'
    ]);
// append




});
