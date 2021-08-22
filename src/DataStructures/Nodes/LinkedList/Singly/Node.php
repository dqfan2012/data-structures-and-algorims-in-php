<?php

declare(strict_types=1);

namespace Tranquility\DataStructures\Nodes\LinkedList\Singly;

use Tranquility\DataStructures\Nodes\AbstractNode;

class Node extends AbstractNode
{
    public $next;

    public function __construct(mixed $value)
    {
        parent::__construct($value);

        $this->next = null;
    }
}
