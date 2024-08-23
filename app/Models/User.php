<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'fecha_registro',
        'fecha_ultima_modificacion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password', // Si no usas autenticación en esta tabla, puedes quitar esto.
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_registro' => 'datetime',
        'fecha_ultima_modificacion' => 'datetime',
    ];

    /**
     * Automatically set the dates when creating or updating a user.
     */
    public static function boot()
    {
        parent::boot();

        // Set the fecha_registro when creating a new user
        static::creating(function ($user) {
            $user->fecha_registro = now();
        });

        // Set the fecha_ultima_modificacion when updating a user
        static::updating(function ($user) {
            $user->fecha_ultima_modificacion = now();
        });
    }
}
