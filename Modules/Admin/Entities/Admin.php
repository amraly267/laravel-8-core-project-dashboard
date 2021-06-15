<?php

namespace Modules\Admin\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Storage;
use Modules\Country\Entities\Country;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public static $storageFolder = 'admins';
    protected $fillable = ['name', 'email', 'mobile', 'image', 'password', 'gender', 'country_id'];
    protected $hidden = ['password', 'remember_token'];

    // === Return storage folder to upload or delete model files ===
    protected static function storageFolder()
    {
        return self::$storageFolder;
    }
    // === End function ===

    // === Admin country ===
    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }
    // === End function ===

    // === Admin role ===
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id');
    }
    // === End function ===

    // === Get image path or set default image ===
    public function getImagePathAttribute()
    {
        return is_null($this->image) ? url('img/dashboard/default-user.svg') : Storage::disk(self::$storageFolder)->url($this->image);
    }
    // === End function ===



}
