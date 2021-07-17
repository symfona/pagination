<?php declare(strict_types=1);

namespace Symfona\Pagination\Enum;

final class Sort
{
    public const ASC = 'asc';
    public const DESC = 'desc';

    public const DIRECTIONS = [
        self::ASC,
        self::DESC,
    ];
}
