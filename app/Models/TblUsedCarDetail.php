<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblUsedCarDetail extends Model
{
    use HasFactory;
    protected $table = "tbl_used_car_detail";
    protected $primaryKey = "product_id";
    protected $fillable = ['fuel_type'];
}
