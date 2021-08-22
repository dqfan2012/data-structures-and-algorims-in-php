<?php

declare(strict_types=1);

namespace Tranquility\DataStructures\Queue;

interface QueueInterface
{
    public function enqueue(mixed $item): array;
    public function dequeue(): mixed;
}
