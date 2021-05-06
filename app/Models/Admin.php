<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Storage;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = ['name', 'email', 'mobile', 'image', 'password'];
    protected $hidden = ['password', 'remember_token'];

    // === Get image path or set default image ===
    public function getImagePathAttribute()
    {
        return is_null($this->image) ? asset('img/dashboard/default-user.png') : Storage::disk('admins')->url($this->image);
    }
    // === End function ===
}
