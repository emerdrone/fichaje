<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empresa
 *
 * @property $id
 * @property $nombre
 * @property $Direccion
 * @property $Cp
 * @property $Nif
 * @property $Telefono
 * @property $Email
 * @property $provin_id
 * @property $territorio_id
 * @property $localidad_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Localidad $localidad
 * @property Provin $provin
 * @property Territorio $territorio
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empresa extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','Direccion','Cp','Nif','Telefono','Email','provin_id','territorio_id','localidad_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function localidad()
    {
        return $this->hasOne('App\Models\Localidad', 'id', 'localidad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provin()
    {
        return $this->hasOne('App\Models\Provin', 'id', 'provin_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function territorio()
    {
        return $this->hasOne('App\Models\Territorio', 'id', 'territorio_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'empresa_id', 'id');
    }
    

}
