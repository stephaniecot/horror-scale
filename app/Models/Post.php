<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category'];
    protected $fillable = ['user_id', 'category_id', 'slug', 'title', 'author', 'year', 'thumbnail', 'summary', 'active'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('summary', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );



    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($post) {
            $post->favorite()->each(function($favorite) {
                $favorite->delete();
            });
        });
        self::deleting(function($post) {
            $post->scores()->each(function($score) {
                $score->delete();
            });
        });
    }
}
