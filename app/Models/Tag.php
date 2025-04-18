<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Tag extends Model
{

    protected $fillable = [
        'name'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tags')
                    ->using(ProjectTag::class)
                    ->withTimestamps();
    }
}
