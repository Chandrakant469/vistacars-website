<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblTestDriveModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_test_drive';
    protected $primaryKey = 'test_drive_id';
    protected $fillable = ['test_drive_id', 'login_id', 'product_id', 'showroom_location', 'address', 'test_drive_date', 'test_drive_time', 'created_date', 'created_time', 'td_status'];
    public $timestamps = false;
}
