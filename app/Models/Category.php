<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // cuman GUARD idnya (gaboleh dimasukkin sembarangan!)
    protected $guarded = ['id'];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
