<?php declare(strict_types=1);

namespace Symfona\Pagination\Adapter\InMemory;

use Symfona\Pagination\Adapter\AdapterInterface;
use Symfona\Pagination\Query;
use Symfona\Pagination\Result;

final class ArrayObjectAdapter implements AdapterInterface
{
    /**
     * @param \ArrayObject<int, mixed> $builder
     */
    public function __construct(private \ArrayObject $builder)
    {
    }

    public function getResult(Query $query): Result
    {
        if (0 === $count = $this->builder->count()) {
            return new Result(0, []);
        }

        return new Result($count, \array_slice($this->builder->getArrayCopy(), $query->skip, $query->limit));
    }
}
