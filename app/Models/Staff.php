<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; 
use Spatie\Permission\Traits\HasRoles; 

class Staff extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_no',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}