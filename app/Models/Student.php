<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'student_name',
        'image',
        'birthday',
        'address',
        'phone_number',
        'gender',
        'faculty_id',
    ];
    
     public function faculty()
    {
        return $this->belongsTo('App\Models\Faculty');
    }

    public function mark()
    {
        return $this->hasMany('App\Models\Mark');
    }

    public function subject()
    {
        return $this->hasMany('App\Models\Subject');
    }
}
