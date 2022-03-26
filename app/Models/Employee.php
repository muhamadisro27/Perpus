<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory,SoftDeletes;


    use HasFactory,SoftDeletes;

    protected $fillable = [
        'profile_id',
        'major_id',
        'nip',
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

    public function major() {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
