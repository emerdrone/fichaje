<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provin extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
        'territorio_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre','territorio_id'];

    public function empresas()
    {
        return $this->hasMany('App\Models\Empresa', 'provin_id', 'id');
    }

    public function localidads()
    {
        return $this->hasMany('App\Models\Localidad', 'provin_id', 'id');
    }

    public function territorio()
    {
        return $this->hasOne('App\Models\Territorio', 'id', 'territorio_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'provin_id', 'id');
    }


}
