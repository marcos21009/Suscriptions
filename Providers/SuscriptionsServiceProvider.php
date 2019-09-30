<?php

namespace Modules\Suscriptions\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Suscriptions\Events\Handlers\RegisterSuscriptionsSidebar;

class SuscriptionsServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterSuscriptionsSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('products', array_dot(trans('suscriptions::products')));
            $event->load('plans', array_dot(trans('suscriptions::plans')));
            $event->load('features', array_dot(trans('suscriptions::features')));
            $event->load('suscriptions', array_dot(trans('suscriptions::suscriptions')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('suscriptions', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Suscriptions\Repositories\ProductRepository',
            function () {
                $repository = new \Modules\Suscriptions\Repositories\Eloquent\EloquentProductRepository(new \Modules\Suscriptions\Entities\Product());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Suscriptions\Repositories\Cache\CacheProductDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Suscriptions\Repositories\PlanRepository',
            function () {
                $repository = new \Modules\Suscriptions\Repositories\Eloquent\EloquentPlanRepository(new \Modules\Suscriptions\Entities\Plan());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Suscriptions\Repositories\Cache\CachePlanDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Suscriptions\Repositories\FeatureRepository',
            function () {
                $repository = new \Modules\Suscriptions\Repositories\Eloquent\EloquentFeatureRepository(new \Modules\Suscriptions\Entities\Feature());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Suscriptions\Repositories\Cache\CacheFeatureDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Suscriptions\Repositories\PlanFeatureRepository',
            function () {
                $repository = new \Modules\Suscriptions\Repositories\Eloquent\EloquentPlanFeatureRepository(new \Modules\Suscriptions\Entities\PlanFeature());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Suscriptions\Repositories\Cache\CachePlanFeatureDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Suscriptions\Repositories\SuscriptionRepository',
            function () {
                $repository = new \Modules\Suscriptions\Repositories\Eloquent\EloquentSuscriptionRepository(new \Modules\Suscriptions\Entities\Suscription());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Suscriptions\Repositories\Cache\CacheSuscriptionDecorator($repository);
            }
        );
// add bindings




    }
}
