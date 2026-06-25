<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelVariant extends Model
{
    use HasFactory;
    protected $table = 'model_variant';
    protected $primaryKey = 'variant_id';
    protected $fillable = ['variant_name'];
}
