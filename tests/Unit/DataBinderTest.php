<?php

namespace Vespera\DataBinder\Tests\Unit;

use Vespera\DataBinder\Support\Facades\DataBinder;
use Vespera\DataBinder\Tests\TestCase;

class DataBinderTest extends TestCase
{
    /** @test */
    public function it_can_bind_data()
    {
        $this->assertNull(DataBinder::last());

        $data = ['foo' => 'bar'];
        DataBinder::bind($data);
        $this->assertEquals($data, DataBinder::last());
    }

    /** @test */
    public function it_can_bind_multiple_data()
    {
        DataBinder::bind($targetA = ['foo' => 'bar']);
        DataBinder::bind($targetB = ['baz' => 'boo']);

        $this->assertEquals($targetB, DataBinder::last());
        DataBinder::pop();

        $this->assertEquals($targetA, DataBinder::last());
        DataBinder::pop();

        $this->assertNull(DataBinder::last());
    }
}
