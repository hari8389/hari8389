<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Student extends Model
{
    
    protected $fillable = [
        'id',
        'std_id',
        'student_name',
        'gallery',
        'date_of_birth',
        
        
    ];
    use Sortable;
    public $sortable = ['id', 'std_id', 'student_name', 'created_at', 'updated_at'];
    public function getclasslist()
    {
        return $this->belongsTo(Std::class);
    }
    public function getteacherlist()
    {
        return $this->belongsTo(Teacher::class);
    }
}
