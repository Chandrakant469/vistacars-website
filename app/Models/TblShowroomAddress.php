<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblShowroomAddress extends Model
{
    use HasFactory;
    protected $table = 'tbl_showroom_address';
    protected $primaryKey = 'address_id';
    protected $fillable = ['location_type', 'city', 'location_name','address','contact','link','status'];
}
