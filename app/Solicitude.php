<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    protected $fillable = [
        'id',
        'name',
        'surname',
        'name_business',
        'phone',
        'email',
        'direction',
        'description',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
