<?php declare(strict_types=1);

namespace Symfona\Pagination\Adapter;

interface FactoryInterface
{
    public function create(object $builder): AdapterInterface;
}
