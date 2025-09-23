<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Asegúrate de agregar este campo si no existe
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * URL del perfil de usuario para AdminLTE
     */
    public function adminlte_profile_url()
    {
        return route('profile.show'); // Asegúrate de tener esta ruta definida
    }
    
    /**
     * Descripción del usuario para AdminLTE
     */
    public function adminlte_desc()
    {
        // Si tienes un campo 'role' en tu tabla users, úsalo
        if (isset($this->role)) {
            return ucfirst($this->role);
        }
        
        // Si no, puedes devolver un valor por defecto basado en algún criterio
        return 'Usuario';
    }
    
    /**
     * Imagen de perfil para AdminLTE
     */
    public function adminlte_image()
    {
        // Usa la foto de perfil de Jetstream si está disponible
        if ($this->profile_photo_url) {
            return $this->profile_photo_url;
        }
        
        // Imagen por defecto (puedes cambiarla)
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }
}