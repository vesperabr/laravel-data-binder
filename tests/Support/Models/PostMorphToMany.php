<?php

namespace Vespera\DataBinder\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;

class PostMorphToMany extends Model
{
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
