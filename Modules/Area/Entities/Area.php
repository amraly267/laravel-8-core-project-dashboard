<?php

namespace Modules\Area\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\City\Entities\City;

class Area extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['name'];
    protected $fillable = ['name', 'city_id', 'status'];

    // === Area city ===
    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
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
        return $this->status ?  "<span class='badge badge-light-success'>".trans('area::dashboard.active')."</span>" : "<span class='badge badge-light-danger'>".trans('area::dashboard.deactivate')."</span>";
    }
    // === End function =
}