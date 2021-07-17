<?php declare(strict_types=1);

namespace Symfona\Pagination\Adapter;

final class Factory implements FactoryInterface
{
    /**
     * @var array<class-string, class-string>
     */
    private array $adapters = [];

    /**
     * @param class-string $builderClassName
     * @param class-string $adapterClassName
     */
    public function add(string $builderClassName, string $adapterClassName): void
    {
        $this->adapters[$builderClassName] = $adapterClassName;
    }

    public function create(object $builder): AdapterInterface
    {
        foreach ($this->adapters as $builderClassName => $adapterClassName) {
            if (\is_a($builder, $builderClassName)) {
                return new $adapterClassName($builder);
            }
        }

        throw new Exception\AdapterNotFoundException($builder);
    }
}
