<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblContactRequestedModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_contact_requested';
    protected $primaryKey = 'cr_id';
    protected $fillable = ['cr_id', 'login_id', 'product_id', 'cr_status', 'created_date', 'created_time'];
    public $timestamps = false;
}
