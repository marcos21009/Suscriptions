<?php

namespace Modules\Suscriptions\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    use Translatable;

    protected $table = 'suscriptions__suscriptions';
    public $translatedAttributes = [];
    protected $fillable = [];
}
