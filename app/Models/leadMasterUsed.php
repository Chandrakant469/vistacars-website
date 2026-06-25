<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leadMasterUsed extends Model
{
    use HasFactory;
    protected $table = 'lead_master_used';
    protected $primaryKey = 'enq_id';
    protected $fillable = ['name','address','email','contact_no'];
}
