<?php

namespace Vespera\DataBinder\Tests\Unit;

use Vespera\DataBinder\DataBinder;
use Vespera\DataBinder\Tests\TestCase;

class DataBinderTest extends TestCase
{
    /** @test */
    public function it_can_bind_data()
    {
        $binder = app(DataBinder::class);
        $this->assertNull($binder->last());

        $data = ['foo' => 'bar'];
        $binder->bind($data);
        $this->assertEquals($data, $binder->last());
    }

    /** @test */
    public function it_can_bind_multiple_data()
    {
        $binder = app(DataBinder::class);

        $binder->bind($targetA = ['foo' => 'bar']);
        $binder->bind($targetB = ['baz' => 'boo']);

        $this->assertEquals($targetB, $binder->last());
        $binder->pop();

        $this->assertEquals($targetA, $binder->last());
        $binder->pop();

        $this->assertNull($binder->last());
    }
}
