<?php

namespace App;

use App\Department;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'id',
        'name',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function solicitudes()
    {
        return $this->hasMany(Solicitude::class);
    }
}
