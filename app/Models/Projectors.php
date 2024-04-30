<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectors extends Model
{
    protected $fillable = ['name','resolution', 'Hz', 'brightness', 'panel_type', 'smart', 'power_consumption'];
}
