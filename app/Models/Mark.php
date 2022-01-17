<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'student_subject';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'subject_id', 'mark'];
    use HasFactory;
}
