<?php

declare(strict_types=1);

namespace Tranquility\DataStructures\LinkedList\Singly;

use Tranquility\DataStructures\LinkedList\LinkedListInterface;
use Tranquility\DataStructures\Nodes\LinkedList\Singly\Node;
use Tranquility\DataStructures\Collection\ArrayInterface;
use Tranquility\DataStructures\Stack\StackInterface;

class LinkedList implements LinkedListInterface, ArrayInterface
{
    private ?Node $head;
    private ?Node $tail;
    private $length;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->length = 0;
    }

    public function push(mixed $value): LinkedList
    {
        $newNode = new Node($value);

        if ($this->isEmpty()) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }

        $this->length++;

        return $this;
    }

    public function pop(): ?Node
    {
        if ($this->isEmpty()) {
            return null;
        }

        $poppedNode = $this->tail;

        if ($this->head !== $this->tail) {
            $newTail = $this->getNode($this->length - 2);

            $newTail->next = null;
            $this->tail = $newTail;
        } else {
            $this->head = null;
            $this->tail = null;
        }

        $this->length--;

        return $poppedNode;
    }

    public function getNode(int $index) : ?Node
    {
        if ($index < 0 || $index > $this->length || $this->isEmpty()) {
            return null;
        }

        if ($index === 0) {
            return $this->head;
        }

        if ($index === $this->length - 1) {
            return $this->tail;
        }

        $currentNode = $this->head;
        $iterator = 0;

        while ($iterator < $index) {
            $iterator++;
            $currentNode = $currentNode->next;
        }

        return $currentNode;
    }

    public function isEmpty(): bool
    {
        return $this->length === 0;
    }
}
