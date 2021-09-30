<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

class Queue implements QueueInterface, CollectionHelperInterface
{
    private $queue;

    public function __construct()
    {
        $this->queue = [];
    }

    public function getLength(): int
    {
        return count($this->queue);
    }

    public function enqueue(mixed $item): array
    {
        $this->queue[] = $item;

        return $this->queue;
    }

    public function dequeue(): mixed
    {
        return array_shift($this->queue);
    }

    public function peek(): mixed
    {
        return $this->queue[0];
    }

    public function isEmpty(): bool
    {
        return $this->getLength() === 0;
    }
}
