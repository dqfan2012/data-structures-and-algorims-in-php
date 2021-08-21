<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

class Stack implements StackInterface, CollectionHelperInterface
{
    private $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function getLength(): int
    {
        return count($this->stack);
    }

    public function push(mixed $item): array
    {
        $this->stack[] = $item;

        return $this->stack;
    }

    public function pop(): mixed
    {
        $item = array_pop($this->stack);

        return $item;
    }

    public function peek(): mixed
    {
        return $this->stack[$this->getLength() - 1];
    }

    public function isEmpty(): bool
    {
        return $this->getLength() === 0;
    }
}