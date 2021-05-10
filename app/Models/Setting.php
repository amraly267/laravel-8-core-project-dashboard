<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Storage;

class Setting extends Model
{
    use HasFactory, HasTranslations;
    public static $storageFolder = 'settings';
    public $translatable = ['project_name'];
    protected $fillable = ['project_name', 'contact_us_email', 'contact_us_mobile', 'contact_us_phone', 'logo', 'facebook_url', 'twitter_url',
                            'youtube_url', 'instagram_url', 'whatsapp_number', 'snapchat_url', 'css_in_header', 'js_before_header', 'js_before_body'];

    // === Return storage folder to upload or delete model files ===
    protected static function storageFolder()
    {
        return self::$storageFolder;
    }
    // === End function ===

    // === Get flag path or set default image ===
    public function getLogoPathAttribute()
    {
        return is_null($this->logo) ? asset('img/dashboard/default-image.svg') : Storage::disk(self::$storageFolder)->url($this->logo);
    }
    // === End function ===

}
