<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPic extends Model
{
    use HasFactory;
    protected $fillable = [
        'path'
    ];

    public function Blog(){
        return $this->belongsTo(Blog::class);
    }

    public function PicType(){
        return $this->belongsTo(PicType::class);
    }
}
