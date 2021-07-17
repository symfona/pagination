<?php declare(strict_types=1);

namespace Symfona\Pagination;

final class Result
{
    public function __construct(public int $count, public iterable $items)
    {
    }
}
