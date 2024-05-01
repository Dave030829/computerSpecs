<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilePhones extends Model
{
    protected $fillable = ['name','price', 'processor', 'gpu', 'ram', 'storage_type','storage_size'
    ,'boot_time', 'in_stock','os','available'];
}
