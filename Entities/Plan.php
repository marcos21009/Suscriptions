<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Suscriptions\Presenters\PlansPresenter;
use Modules\Core\Traits\NamespacedEntity;
class Plan extends Model
{
    use Translatable, PresentableTrait,NamespacedEntity;

    protected $table = 'suscriptions__plans';
    public $translatedAttributes = ['name','description'];
    protected $fillable = [
      'code',
      'status',
      'display_order',
      'recommendation',
      'free',
      'visible',
      'price',
      'frequency',
      'bill_cycle',
      'trial_period',
      'product_id',
      'options'
    ];
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
    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function planfeature()
    {
        return $this->hasMany(PlanFeature::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'suscriptions__planfeatures')->withTimestamps();
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
        $config = implode('.', ['asgard.suscriptions.config.plan.relations', $method]);

        #i: Relation method resolver
        if (config()->has($config)) {
            $function = config()->get($config);

            return $function($this);
        }

        #i: No relation found, return the call to parent (Eloquent) to handle it.
        return parent::__call($method, $parameters);
    }


}
