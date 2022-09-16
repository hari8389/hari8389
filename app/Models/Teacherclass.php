<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacherclass extends Model
{
    use HasFactory;
    protected $table = 'classteachrs';
    
    protected $fillable = [
        'id',
        'class_name',
        'teacher_id',
        
        
    ];
    public function getstudent()
    {
        return $this->hasMany(Student::class,'teacher_id','id');
    }
    public function getteacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
