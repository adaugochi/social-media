<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed image
 */
class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'name', 'bio', 'url', 'image'
    ];

    public function profileImage()
    {
        return ($this->image) ? '/storage/'.$this->image : '/storage/profiles/9Z7SyvIg3MyqppUCLepOdoF0ObHDs4DUK76WV6CY.png';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
