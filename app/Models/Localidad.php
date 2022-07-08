<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localidad extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre','provin_id'];

    public function empresas()
    {
        return $this->hasMany('App\Models\Empresa', 'localidad_id', 'id');
    }

    public function provin()
    {
        return $this->hasOne('App\Models\Provin', 'id', 'provin_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'localidad_id', 'id');
    }


}
