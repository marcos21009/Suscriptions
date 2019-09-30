<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','caption','description'];
    protected $table = 'suscriptions__feature_translations';
}
