<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
