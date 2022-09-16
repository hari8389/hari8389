<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Std extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'class_name',
        'teacher_id',
        
        
    ];
    public function getstudent()
    {
        return $this->hasMany(Student::class);
    }
    public function getteacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
}
