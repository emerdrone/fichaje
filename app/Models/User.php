<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Symfony\Contracts\Service\Attribute\Required;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    static $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
    ];

    protected $fillable = ['name', 'password', 'email', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'current_team_id', 'profile_photo_path', 'direccion', 'cp', 'empresa_id', 'provin_id', 'localidad_id','comentario','telefono'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }

    public function localidad()
    {
        return $this->hasOne('App\Models\Localidad', 'id', 'localidad_id');
    }

    public function provin()
    {
        return $this->hasOne('App\Models\Provin', 'id', 'provin_id');
    }
}
