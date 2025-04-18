<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectPic extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'pic_type_id',
    ];
    
    public function Project(){
        return $this->belongsTo(Project::class);
    }
    public function PicType(){
        return $this->belongsTo(PicType::class);
    }


    function getFirstSelectedPic(Project $project){

        return $this->where('id', $project->path)->first();
    }
}
