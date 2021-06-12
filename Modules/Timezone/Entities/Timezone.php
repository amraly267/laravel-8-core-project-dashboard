<?php

namespace Modules\Timezone\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;
    protected $table = 'timezones';
    protected $fillable = ['name'];
}
