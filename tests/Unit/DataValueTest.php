<?php

namespace Vespera\DataBinder\Tests\Unit;

use Illuminate\Support\Collection;
use Vespera\DataBinder\Support\Facades\DataBinder;
use Vespera\DataBinder\Support\Facades\DataValue;
use Vespera\DataBinder\Tests\Support\Models\Comment;
use Vespera\DataBinder\Tests\Support\Models\PostBelongsToMany;
use Vespera\DataBinder\Tests\Support\Models\PostHasMany;
use Vespera\DataBinder\Tests\Support\Models\PostMorphMany;
use Vespera\DataBinder\Tests\Support\Models\PostMorphToMany;
use Vespera\DataBinder\Tests\TestCase;
use Vespera\DataBinder\Tests\Support\Traits\InteractsWithDatabase;

class DataValueTest extends TestCase
{
    use InteractsWithDatabase;

    /** @test */
    public function it_can_retrieve_value_from_array()
    {
        DataBinder::bind(['foo' => 'bar']);
        $this->assertEquals('bar', DataValue::get('foo'));
    }

    /** @test */
    public function it_can_retrieve_value_from_collection()
    {
        DataBinder::bind(Collection::make(['foo' => 'bar']));
        $this->assertEquals('bar', DataValue::get('foo'));
    }

    /** @test */
    public function it_retrieve_keys_from_has_many_relationship()
    {
        $this->setupDatabase();

        $post = PostHasMany::create(['content' => 'Content']);
        $commentA = $post->comments()->create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = $post->comments()->create(['content' => 'Content C']);

        DataBinder::bind($post);

        $this->assertContains($commentA->getKey(), DataValue::get('comments'));
        $this->assertContains($commentC->getKey(), DataValue::get('comments'));
        $this->assertNotContains($commentB->getKey(), DataValue::get('comments'));
    }

    /** @test */
    public function it_retrieve_keys_from_belongs_to_many_relationship()
    {
        $this->setupDatabase();

        $post = PostBelongsToMany::create(['content' => 'Content']);
        $commentA = Comment::create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = Comment::create(['content' => 'Content C']);
        $post->comments()->sync([$commentA->getKey(), $commentC->getKey()]);

        DataBinder::bind($post);

        $this->assertContains($commentA->getKey(), DataValue::get('comments'));
        $this->assertContains($commentC->getKey(), DataValue::get('comments'));
        $this->assertNotContains($commentB->getKey(), DataValue::get('comments'));
    }

    /** @test */
    public function it_retrieve_keys_from_morph_many_relationship()
    {
        $this->setupDatabase();

        $post = PostMorphMany::create(['content' => 'Content']);
        $commentA = $post->comments()->create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = $post->comments()->create(['content' => 'Content C']);

        DataBinder::bind($post);

        $this->assertContains($commentA->getKey(), DataValue::get('comments'));
        $this->assertContains($commentC->getKey(), DataValue::get('comments'));
        $this->assertNotContains($commentB->getKey(), DataValue::get('comments'));
    }

    /** @test */
    public function it_retrieve_keys_from_morph_to_many_relationship()
    {
        $this->setupDatabase();

        $post = PostMorphToMany::create(['content' => 'Content']);
        $commentA = $post->comments()->create(['content' => 'Content A']);
        $commentB = Comment::create(['content' => 'Content B']);
        $commentC = $post->comments()->create(['content' => 'Content C']);

        DataBinder::bind($post);

        $this->assertContains($commentA->getKey(), DataValue::get('comments'));
        $this->assertContains($commentC->getKey(), DataValue::get('comments'));
        $this->assertNotContains($commentB->getKey(), DataValue::get('comments'));
    }
}
