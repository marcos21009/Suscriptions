<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use Translatable;

    protected $table = 'suscriptions__planfeatures';
    public $translatedAttributes = [];
    protected $fillable = [];
}
