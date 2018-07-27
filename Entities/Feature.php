<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Suscriptions\Presenters\ProductPresenter;
use Modules\Core\Traits\NamespacedEntity;

class Feature extends Model
{
    use Translatable, PresentableTrait, NamespacedEntity;

    protected $table = 'suscriptions__features';
    public $translatedAttributes = ['name','caption', 'description'];
    protected $fillable = ['name','caption','description','status','type','unit','options'];
    protected $presenter = ProductPresenter::class;
    protected static $entityNamespace = 'encore/suscriptions';
    /**
     * The attributes that should be casted to native types
     * @var array
     */
    protected $casts = [
        'options' => 'array',
        'status' => 'int',
    ];

    /**
     * relation ship Crops entities
     * @return mixed
     */
    public function planFeature(){
        return $this->hasMany(PlanFeature::class);
    }

    public function product(){

        return $this->belogsTo(Product::class);
    }

    /**
     * Check if the post is in draft
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->whereStatus(Status::ACTIVE);
    }

    /**
     * Check if the post is pending review
     * @param Builder $query
     * @return Builder
     */
    public function scopeInactive(Builder $query)
    {
        return $query->whereStatus(Status::INACTIVE);
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        #i: Convert array to dot notation
        $config = implode('.', ['asgard.suscriptions.config.product.relations', $method]);

        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }


}
