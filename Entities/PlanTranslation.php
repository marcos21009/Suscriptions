<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class PlanTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'suscriptions__plan_translations';
}
