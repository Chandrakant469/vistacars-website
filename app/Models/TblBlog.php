<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBlog extends Model
{
    use HasFactory;
    protected $table = "tbl_blog";
    protected $primaryKey = "blog_id";
    protected $fillable = ['blog_description','blog_name','title','keyword','description','image_path'];
}
