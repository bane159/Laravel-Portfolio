<?php

namespace App\Models;

use App\Models\ProjectPic;
use App\Models\ProjectTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'name',
        'task',
        'url',
        'selected',
        'description',
        'start_date',
        'end_date',
        'client',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tags')
                    ->using(ProjectTag::class) // If you want to use your custom pivot model
                    ->withTimestamps(); // If you have timestamps in your pivot table
    }

    public function ProjectPics() : HasMany{
        return $this -> HasMany(ProjectPic::class);
    }


    public function getFirstLargePic(){
        return $this->ProjectPics()->where('pic_type_id','=', PicType::getLargeId())->first() -> path;
    }

    






    // public function getStatusAttribute($value)
    // {
    //     return $value === 1 ? 'active' : 'inactive';
    // }


    // public function setStatusAttribute($value)
    // {
    //     $this->attributes['status'] = $value === 'active' ? 1 : 0;
    // }
    // public function getStartDateAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->format('Y-m-d');
    // }
    // public function setStartDateAttribute($value)
    // {
    //     $this->attributes['start_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    // }
    // public function getEndDateAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->format('Y-m-d');
    // }
    // public function setEndDateAttribute($value)
    // {
    //     $this->attributes['end_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    // }
    // public function getCreatedAtAttribute($value)
    // {
    //     return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    // }


}
