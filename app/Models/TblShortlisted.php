<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblShortlisted extends Model
{
    use HasFactory;
    protected $table = "tbl_shortlisted";
    protected $fillable = ['login_id', 'product_id', 'sl_status', 'created_date', 'created_time'];
    public $timestamps = false;
}
