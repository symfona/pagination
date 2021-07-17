<?php declare(strict_types=1);

namespace Symfona\Pagination;

final class Paginator
{
    public function __construct(private Adapter\FactoryInterface $factory)
    {
    }

    public function paginate(object $builder, Query $query): Result
    {
        return $this->factory->create($builder)->getResult($query);
    }
}
