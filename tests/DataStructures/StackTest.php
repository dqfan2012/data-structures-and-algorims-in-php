<?php

declare(strict_types=1);

namespace Tranquility\Tests\DataStructures;

use Mockery;
use PHPUnit\Framework\TestCase;
use Tranquility\DataStructures\Stack;

final class StackTest extends TestCase
{
    /** @var */
    private $mockStack;

    public function setUp(): void
    {
        $this->mockStack = Mockery::mock(Stack::class);
    }

    /** @test */
    public function it_creates_an_empty_stack_variable()
    {
        $length = 0;

        $this->mockStack->shouldReceive('length')
            ->once()
            ->andReturn($length);

        $this->assertEquals($this->mockStack->length(), $length);
    }

    /** @test */
    public function it_can_add_an_item_to_the_stack()
    {
        $item = 'A';
        $length = 1;

        $this->mockStack->shouldReceive('push')
            ->with($item)
            ->once()
            ->andReturn(['A']);

        $this->mockStack->push($item);

        $this->mockStack->shouldReceive('length')
            ->once()
            ->andReturn($length);

        $this->assertEquals($this->mockStack->length(), $length);
    }

    /** @test */
    public function it_can_remove_an_item_from_the_stack()
    {
        $item1 = 'A';
        $item2 = 'B';
        $item3 = 'C';
        $length = 2;

        $this->mockStack->shouldReceive('push')
            ->with($item1)
            ->once()
            ->andReturn(['A']);

        $this->mockStack->push($item1);

        $this->mockStack->shouldReceive('push')
            ->with($item2)
            ->once()
            ->andReturn(['A', 'B']);

        $this->mockStack->push($item2);

        $this->mockStack->shouldReceive('push')
            ->with($item3)
            ->once()
            ->andReturn(['A', 'B', 'C']);

        $this->mockStack->push($item3);
        
        $this->mockStack->shouldReceive('pop')
            ->once()
            ->andReturn(['A', 'B']);

        $this->mockStack->shouldReceive('length')
            ->once()
            ->andReturn($length);

        $this->assertEquals($this->mockStack->length(), $length);
    }

    /** @test */
    public function it_reveal_the_top_item_in_the_stack()
    {
        $item1 = 'A';
        $item2 = 'B';
        $item3 = 'C';

        $this->mockStack->shouldReceive('push')
            ->with($item1)
            ->once()
            ->andReturn(['A']);

        $this->mockStack->push($item1);

        $this->mockStack->shouldReceive('push')
            ->with($item2)
            ->once()
            ->andReturn(['A', 'B']);

        $this->mockStack->push($item2);

        $this->mockStack->shouldReceive('push')
            ->with($item3)
            ->once()
            ->andReturn(['A', 'B', 'C']);
        
        $this->mockStack->shouldReceive('peek')
            ->once()
            ->andReturn($item3);

        $this->mockStack->push($item3);
        
        $returnedItem = $this->mockStack->peek();

        $this->assertEquals($returnedItem, $item3);
    }

    /** @test */
    public function it_reveals_the_stack_is_empty()
    {
        $isEmpty = true;

        $this->mockStack->shouldReceive('isEmpty')
            ->once()
            ->andReturn($isEmpty);
        
        $this->assertTrue($isEmpty);
    }
}