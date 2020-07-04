<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'code',
        'name',
        'maximum_students',
        'status',
        'description'
    ];

    const OPENED_STATUS = 'opened';
    const CLOSED_STATUS = 'closed';
}
