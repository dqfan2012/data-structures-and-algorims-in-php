<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

class Stack implements StackInterface
{
    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function length(): int
    {
        return count($this->stack);
    }

    public function push(mixed $item): array
    {
        array_push($this->stack, $item);

        return $this->stack;
    }

    public function pop(): array
    {
        array_pop($this->stack);

        return $this->stack;
    }

    public function peek(): mixed
    {
        return $this->stack[$this->length() - 1];
    }

    public function isEmpty(): bool
    {
        return $this->length() === 0;
    }
}