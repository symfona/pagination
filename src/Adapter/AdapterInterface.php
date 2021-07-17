<?php declare(strict_types=1);

namespace Symfona\Pagination\Adapter;

use Symfona\Pagination\Query;
use Symfona\Pagination\Result;

interface AdapterInterface
{
    public function getResult(Query $query): Result;
}
