<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Suscriptions\Presenters\ProductPresenter;
use Modules\Core\Traits\NamespacedEntity;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;

class Product extends Model
{
    use Translatable, MediaRelation, PresentableTrait, NamespacedEntity;

    protected $table = 'suscriptions__products';
    public $translatedAttributes = ['name','description'];
    protected $fillable = ['name','description','require_shipping_address','status','user_id','options'];
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
    public function plans(){
        return $this->hasMany(Plan::class);
    }

    /**
     * relation ship User entity
     * @return mixed
     */
    public function user()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }

    /**
     * Get the thumbnail image for the current blog post
     * @return File|string
     */
    public function getThumbnailAttribute()
    {
        $thumbnail = $this->files()->where('zone', 'thumbnail')->first();
        if ($thumbnail === null) {
            return '';
        }

        return $thumbnail;
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
