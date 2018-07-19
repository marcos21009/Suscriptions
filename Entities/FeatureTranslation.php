<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'suscriptions__feature_translations';
}
