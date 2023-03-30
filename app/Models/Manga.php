<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'description',
        'name',
        'ratting',
        'release_day',
        'views',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'manga_id',
        'author_id',
        'genre_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'release_day' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function translator(){
        return $this->belongsTo(Translator::class);
    }

    public function genre()
    {
        return $this->hasMany(Genre::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }
        if (isset($filters['author'])) {
            $query->where('author_id', $filters['author']);
        }
        if (isset($filters['genre'])) {
            $query->where('genre_id', $filters['genre']);
        }
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        if (isset($filters['release_day'])) {
            $query->where('release_day', $filters['release_day']);
        }
        if (isset($filters['ratting'])) {
            $query->where('ratting', $filters['ratting']);
        }
    }
}
