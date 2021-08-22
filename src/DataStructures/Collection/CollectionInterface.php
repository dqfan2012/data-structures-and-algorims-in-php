<?php

declare(strict_types=1);

namespace Tranquility\DataStructures\Collection;

interface CollectionInterface extends ArrayInterface
{
    public function getLength(): int;
    public function peek(): mixed;
}
