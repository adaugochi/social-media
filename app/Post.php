<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed image
 */
class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['caption', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePosts($query)
    {
        $users = auth()->user()->follows->pluck('user_id');
        return $query->whereIn('user_id', $users)->with('user');
    }
}
