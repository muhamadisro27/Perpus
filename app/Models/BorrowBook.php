<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowBook extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'book_id',
        'student_id',
        'officer_id',
        'date_start',
        'date_end',
        'status',
    ];

    protected $hidden = [
        'deleted_at'
    ];    
}
