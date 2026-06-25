<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblContactDetails extends Model
{
    use HasFactory;
    protected $table = 'tbl_contact_details';
    protected $fillable = ['contact_number', 'contact_email','status'];
}
