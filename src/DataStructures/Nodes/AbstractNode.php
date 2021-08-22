<?php

declare(strict_types=1);

namespace Tranquility\DataStructures\Nodes;

abstract class AbstractNode
{
    protected $value;

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    protected function getValue(): mixed
    {
        return $this->value;
    }
}
