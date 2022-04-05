<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'profile_id',
        'grade_id',
        'major_id',
        'nim',
        'status',
    ];

    protected $hidden = [
        'created_at' ,
        'updated_at',
        'deleted_at',
    ];

    public function profile() {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function borrowBooks() {
        return $this->hasMany(BorrowBook::class, 'student_id');
    }

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function major() {
        return $this->belongsTo(Major::class, 'major_id');
    }

    
}
