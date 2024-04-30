<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalComputers extends Model
{
    protected $fillable = ['name','processor', 'gpu', 'ram', 'storage_type', 'storage_size', 'boot_time', 'os', 'cinebench_score', 'power_consumption'];
}
