<?php

declare(strict_types=1);

namespace Tranquility\Tests\DataStructures\Queue;

use Mockery;
use PHPUnit\Framework\TestCase;
use Tranquility\DataStructures\Queue\Queue;

final class QueueTest extends TestCase
{
    /** @var */
    private $mockQueue;

    public function setUp(): void
    {
        $this->mockQueue = Mockery::mock(Queue::class);
    }

    /** @test */
    public function it_creates_an_empty_queue()
    {
        $expected = 0;

        $this->mockQueue->shouldReceive('getLength')
            ->once()
            ->andReturn($expected);

        $this->assertEquals($expected, $this->mockQueue->getLength());
    }

    /** @test */
    public function it_can_add_an_item_to_the_queue()
    {
        $item = 'A';
        $expected = ['A'];

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item)
            ->once()
            ->andReturn(['A']);

        $queue = $this->mockQueue->enqueue($item);

        $this->assertEquals($expected, $queue);
    }

    /** @test */
    public function it_can_remove_an_item_from_the_queue()
    {
        $item1 = 'A';
        $item2 = 'B';
        $item3 = 'C';

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item1)
            ->once()
            ->andReturn(['A']);

        $this->mockQueue->enqueue($item1);

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item2)
            ->once()
            ->andReturn(['A', 'B']);

        $this->mockQueue->enqueue($item2);

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item3)
            ->once()
            ->andReturn(['A', 'B', 'C']);

        $this->mockQueue->enqueue($item3);

        $this->mockQueue->shouldReceive('dequeue')
            ->once()
            ->andReturn($item1);

        $expected = $this->mockQueue->dequeue();

        $this->assertEquals($expected, $item1);
    }

    /** @test */
    public function it_reveals_the_item_in_the_front_of_the_queue()
    {
        $item1 = 'A';
        $item2 = 'B';
        $item3 = 'C';

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item1)
            ->once()
            ->andReturn(['A']);

        $this->mockQueue->enqueue($item1);

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item2)
            ->once()
            ->andReturn(['A', 'B']);

        $this->mockQueue->enqueue($item2);

        $this->mockQueue->shouldReceive('enqueue')
            ->with($item3)
            ->once()
            ->andReturn(['A', 'B', 'C']);

        $this->mockQueue->enqueue($item3);

        $this->mockQueue->shouldReceive('peek')
            ->once()
            ->andReturn($item1);

        $expected = $this->mockQueue->peek();

        $this->assertEquals($expected, $item1);
    }

    /** @test */
    public function it_reveals_the_queue_is_empty()
    {
        $isEmpty = true;

        $this->mockQueue->shouldReceive('isEmpty')
            ->once()
            ->andReturn($isEmpty);

        $expected = $this->mockQueue->isEmpty();

        $this->assertEquals($expected, $isEmpty);
    }
}
