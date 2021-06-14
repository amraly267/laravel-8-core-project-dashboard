<?php

namespace Modules\City\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Country\Entities\Country;

class City extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['name'];
    protected $fillable = ['name', 'country_id', 'status'];

    // === City country ===
    public function country()
    {
        return $this->belongsTo(Country::class)->withTrashed();
    }
    // === End function ===

    // === Escape translation arabic unicode before saving to DB ===
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    // === End function ===

    // === Status label ===
    public function getStatusLabelAttribute()
    {
        return $this->status ?  "<span class='badge badge-light-success'>".trans('city::dashboard.active')."</span>" : "<span class='badge badge-light-danger'>".trans('city::dashboard.deactivate')."</span>";
    }
    // === End function =
}
