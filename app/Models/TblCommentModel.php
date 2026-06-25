<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblCommentModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_comment';
    protected $primaryKey = "comment_id";
    protected $fillable = ['comment','commentor','blog_id','comment_time','status'];

    public $timestamps = false;
}

?>
