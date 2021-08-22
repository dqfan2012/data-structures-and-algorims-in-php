<?php

declare(strict_types=1);

namespace Tranquility\DataStructures\LinkedList;

use Tranquility\DataStructures\Nodes\AbstractNode as Node;

interface LinkedListInterface
{
    public function push(mixed $value);
    public function pop(): ?Node;
    public function getNode(int $index) : ?Node;
}
