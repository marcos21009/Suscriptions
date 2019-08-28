<?php

namespace Modules\Suscriptions\Entities;

use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{

    protected $table = 'suscriptions__suscriptions';
    protected $fillable = [
      "init_date",
      "end_date",
      "days_quantity",
      "status",
      "total",
      "plan_id",
      "user_id"
    ];

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    /**
     * relation ship User entity
     * @return mixed
     */
    public function user()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }
}
