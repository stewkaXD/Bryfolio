<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    // buat enable mass assignment
    // biar field2 yg boleh diisi apa 
    // protected $fillable = ['title', 'excerpt', 'body'];

    // ini kebalikannya
    // yg gaboleh diisi apa
    protected $guarded = ['id'];
    protected $with = ['author', 'category']; //buat N+1 problem

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
