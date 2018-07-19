<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class SuscriptionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'suscriptions__suscription_translations';
}
