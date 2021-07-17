<?php declare(strict_types=1);

namespace Symfona\Pagination\Adapter\Exception;

final class AdapterNotFoundException extends \InvalidArgumentException
{
    public function __construct(object $builder)
    {
        parent::__construct(\sprintf('Adapter not found for the "%s"', \get_class($builder)));
    }
}
