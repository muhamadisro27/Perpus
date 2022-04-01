<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use SoftDeletes,HasFactory;


    protected $fillable = [
        'code_books_id',
        'category_books_id',
        'publisher_books_id',
        'title',
        'slug',
        'synopsis',
        'author',
        'total_page',
        'total_stock',
        'publish_year'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Relation belongsTo category book
    public function category()
    {
        return $this->belongsTo(CategoryBook::class);
    }

    // Relation belongsTo publisher book
    public function publisher()
    {
        return $this->belongsTo(PublisherBook::class);
    }
    
    public function getRouteKeyName()
    {
        return 'uuid';
    }


}
