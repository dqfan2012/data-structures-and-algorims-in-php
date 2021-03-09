<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

use phpDocumentor\Reflection\Types\Boolean;

interface StackInterface
{
    public function length(): int;
    public function push(mixed $item): array;
    public function pop(): array;
    public function peek(): mixed;
    public function isEmpty(): bool;
}