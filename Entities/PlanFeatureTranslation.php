<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class PlanFeatureTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'suscriptions__planfeature_translations';
}
