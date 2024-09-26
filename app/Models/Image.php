<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Tenantable;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    protected $fillable = ['url', 'description'];
    // public $timestamps = false;
}
