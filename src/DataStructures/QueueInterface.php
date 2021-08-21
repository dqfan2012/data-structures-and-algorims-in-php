<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

interface QueueInterface
{
    public function enqueue(mixed $item): array;
    public function dequeue(): mixed;
}