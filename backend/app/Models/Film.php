<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'director',
        'year',
        'image',
        'duration',
        'score',
        'id_category',
        'id_torrent'
    ];

    protected $primaryKey = 'id_film';
    protected $table = 'films';

    public function torrent()
    {
        return $this->belongsTo(Torrent::class, 'id_torrent', 'id_torrent');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_film');
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'films_lists', 'id_film', 'id_playlist');
    }

}
