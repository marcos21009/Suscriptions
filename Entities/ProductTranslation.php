<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'suscriptions__product_translations';
}
