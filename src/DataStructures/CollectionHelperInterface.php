<?php

declare(strict_types=1);

namespace Tranquility\DataStructures;

interface CollectionHelperInterface
{
    public function getLength(): int;
    public function peek(): mixed;
    public function isEmpty(): bool;
}
