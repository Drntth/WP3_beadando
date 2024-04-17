<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'instructions',
        'image',
        'author_id',
        'category_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class)->orderBy('created_at', 'desc');
    }

    public function getImage() {
        if ($this->image !== null) {
            return "storage//img/uploads/{$this->image}";
        } else {
            return 'storage/img/default/recipe.png';
        }
    }
}
