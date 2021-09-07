<?php

namespace Vespera\DataBinder\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;

class PostHasMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
