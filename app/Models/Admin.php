<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'mobile', 'image', 'password'];
    protected $hidden = ['password', 'remember_token'];

    // === Encrypt password before saving ===
    public function setPasswordAttribute($value)
    {
        $this->password = bcrypt($value);
    }
    // === End function ===

}
