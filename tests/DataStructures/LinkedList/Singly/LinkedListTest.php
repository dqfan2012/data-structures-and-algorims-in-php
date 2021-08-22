<?php

declare(strict_types=1);

namespace Tranquility\Tests\DataStructures\LinkedList\Singly;

use Mockery;
use PHPUnit\Framework\TestCase;
use Tranquility\DataStructures\LinkedList\Singly\LinkedList;
use Tranquility\DataStructures\Nodes\LinkedList\Singly\Node;

final class LinkedListTest extends TestCase
{
    /** @var */
    private $mockQueue;

    public function setUp(): void
    {
        $this->mockList = Mockery::mock(LinkedList::class)
            ->shouldAllowMockingProtectedMethods();
    }

    /** @test */
    public function it_creates_an_empty_list()
    {
        $expected = 0;

        $this->mockList->shouldReceive('isEmpty')
            ->once()
            ->andReturn($expected);

        $this->assertEquals($expected, $this->mockList->isEmpty());
    }

    /** @test */
    public function it_can_add_nodes()
    {
        $value = 5;
        $index = 0;

        $this->mockList->shouldReceive('push')
             ->once()
             ->with($value);

        $this->mockList->push($value);

        $node = Mockery::mock(Node::class)
                ->shouldAllowMockingProtectedMethods();

        $this->mockList->shouldReceive('getNode')
             ->once()
             ->with($index)
             ->andReturn($node);

        $node->shouldReceive('getValue')
             ->once()
             ->andReturn($value);

        $expected = $node->getValue();

        $this->assertEquals($expected, $value);
    }
}
