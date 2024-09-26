<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Tenantable;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prompt extends Model
{
    // use HasFactory;
    // use HasAdvancedFilter;
    // use SoftDeletes;

    public $table = 'prompts';
    protected $fillable = ['webhook_url', 'image_description'];
    // public $timestamps = false;
}
