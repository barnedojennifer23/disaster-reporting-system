<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'reporter_name',
        'contact_number',
        'disaster_type',
        'barangay',
        'description',
        'status',
    ];
}
