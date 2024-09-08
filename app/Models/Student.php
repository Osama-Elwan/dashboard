<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'code';

    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'dept_id'
    ];
    public function department(){
        return $this->belongsTo(Department::class,'dept_id','dept_num');
    }
}
