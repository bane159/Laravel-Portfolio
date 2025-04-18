<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PicType extends Model
{
    
    protected $fillable = [
        'type'
    ];

    public function ProjectPics(){
        return $this->hasMany(ProjectPic::class);
    }

    public function BlogPics(){

        return $this->hasMany(BlogPic::class);

    }
    public static function getLargeId(){
        return PicType::where('type','large')->first()->id;
    }

    public static function getMediumId(){
        return PicType::where('type','medium')->first()->id;
    }
}
