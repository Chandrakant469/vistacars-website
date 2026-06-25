<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblShowroomLocation extends Model
{
    use HasFactory;
    protected $table = 'tbl_showroom_location';
    protected $primaryKey = 'id';
    protected $fillable = ['showroom_name', 'showroom_url', 'status'];
}
