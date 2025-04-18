<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'company_name', 'website', 
        'interest', 'budget_range', 'exact_budget', 'timeline', 'message',
        'ip_address', 'user_agent', 'country', 'city', 
        'device_type', 'browser', 'operating_system', 'is_bot'
    ];
}