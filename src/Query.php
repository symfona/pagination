<?php declare(strict_types=1);

namespace Symfona\Pagination;

use Symfona\Pagination\Enum\Limit;

final class Query
{
    public int $skip;
    public int $limit;
    public array $filters;
    public array $sorting;

    /**
     * @param array<string, array<string, string>> $filters
     * @param array<string, string>                $sorting
     * @param int                                  $skip
     * @param int                                  $limit
     */
    public function __construct(array $filters = [], array $sorting = [], int $skip = 0, int $limit = Limit::DEFAULT)
    {
        $this->skip = $skip;
        $this->limit = $limit;
        $this->filters = $filters;
        $this->sorting = $sorting;
    }
}
