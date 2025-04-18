<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectTag extends Pivot
{
    
    public $timestamps = true;
    
    
    protected $fillable = ['project_id', 'tag_id'];
}
