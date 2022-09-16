<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Std;
class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'phone',
        
        
    ];
   
    public function getclass()
    {
        return $this->hasMany('App\Models\Std');
    }
    
    
}
