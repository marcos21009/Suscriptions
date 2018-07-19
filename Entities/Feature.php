<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use Translatable;

    protected $table = 'suscriptions__features';
    public $translatedAttributes = [];
    protected $fillable = [];
}
