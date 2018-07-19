<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use Translatable;

    protected $table = 'suscriptions__plans';
    public $translatedAttributes = [];
    protected $fillable = [];
}
