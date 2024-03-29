<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Entry extends Model
{
    use HasFactory, Sluggable;

    // buat enable mass assignment
    // biar field2 yg boleh diisi apa 
    // protected $fillable = ['title', 'excerpt', 'body'];

    // ini kebalikannya
    // yg gaboleh diisi apa
    protected $guarded = ['id'];
    protected $with = ['author', 'category']; //buat N+1 problem

    public function scopeSearchFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'LIKE', '%' . $filters['search'] . '%')
        //                  ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'LIKE', '%' . $search . '%')
                         ->orWhere('body', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
