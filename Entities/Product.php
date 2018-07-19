<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $table = 'suscriptions__products';
    public $translatedAttributes = [];
    protected $fillable = [];
}
