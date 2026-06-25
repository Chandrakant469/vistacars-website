<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'tbl_review';
    protected $fillable = ['name', 'review_description', 'user_photo', 'star', 'status'];
}
