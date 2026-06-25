<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakesModels extends Model
{
    use HasFactory;
    protected $table = 'make_models';
    protected $primaryKey = 'model_id';
    protected $fillable = ['model_name', 'model_url'];
}
