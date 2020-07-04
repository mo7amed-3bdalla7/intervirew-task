<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'class_id',
    ];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class,'class_id');
    }
}
