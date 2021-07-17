<?php declare(strict_types=1);

namespace Symfona\Pagination\Tests;

use PHPUnit\Framework\TestCase;
use Symfona\Pagination\Adapter\Exception\AdapterNotFoundException;
use Symfona\Pagination\Adapter\Factory;
use Symfona\Pagination\Adapter\InMemory\ArrayObjectAdapter;
use Symfona\Pagination\Enum\Limit;
use Symfona\Pagination\Paginator;
use Symfona\Pagination\Query;

final class PaginatorTest extends TestCase
{
    public function testAdapterNotFound(): void
    {
        $this->expectException(AdapterNotFoundException::class);

        $paginator = new Paginator(new Factory());
        $paginator->paginate(new \ArrayObject(), new Query());
    }

    public function testEmptyStorage(): void
    {
        $factory = new Factory();
        $factory->add(\ArrayObject::class, ArrayObjectAdapter::class);

        $paginator = new Paginator($factory);

        $result = $paginator->paginate(new \ArrayObject(), new Query());

        self::assertEmpty((array) $result->items);
    }

    /**
     * @param Factory $factory
     *
     * @dataProvider adaptersInheritanceDataProvider
     */
    public function testAdapterInheritance(Factory $factory): void
    {
        $skip = 10;
        $count = 100;
        $builder = new \ArrayObject(\range(1, $count));
        $paginator = new Paginator($factory);

        $result = $paginator->paginate($builder, new Query(skip: $skip));

        self::assertSame($count, $result->count);
        self::assertSame(\range($skip + 1, $skip + Limit::DEFAULT), (array) $result->items);
    }

    public function adaptersInheritanceDataProvider(): iterable
    {
        $factory = new Factory();
        $factory->add(\ArrayObject::class, ArrayObjectAdapter::class);

        yield [$factory];

        $factory = new Factory();
        $factory->add(\IteratorAggregate::class, ArrayObjectAdapter::class);

        yield [$factory];
    }
}
