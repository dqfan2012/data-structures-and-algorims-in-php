<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

interface StackInterface
{
    public function push(mixed $item): array;
    public function pop(): mixed;
}