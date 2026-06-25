<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblFaqs extends Model
{
    use HasFactory;
    protected $table = "tbl_faq";
    protected $primaryKey = "faq_id";
    protected $fillable = ['que','ans','faq_status','created_date'];

}
