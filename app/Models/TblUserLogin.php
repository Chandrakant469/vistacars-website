<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblUserLogin extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_login';
    protected $primaryKey = 'login_id';
    protected $fillable = ['moblie_number', 'name', 'city', 'email_id', 'created_date', 'created_time', 'otp', 'user_status'];
    public $timestamps = false;
}
