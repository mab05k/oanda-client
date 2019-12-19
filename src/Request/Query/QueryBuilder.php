<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query;

use Mab05k\OandaClient\Exception\QueryBuilderException;

/**
 * Class QueryBuilder.
 */
class QueryBuilder
{
    /**
     * @var array|QueryParameterInterface[]
     */
    protected $query;

    /**
     * @throws QueryBuilderException
     *
     * @return QueryBuilder
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * QueryBuilder constructor.
     *
     * @param array $queryParameters
     *
     * @throws QueryBuilderException
     */
    public function __construct(array $queryParameters = [])
    {
        $this->query = [];

        foreach ($queryParameters as $queryParameter) {
            if (!$queryParameter instanceof QueryParameterInterface) {
                throw new QueryBuilderException(sprintf('Invalid Query Parameter passed to Query Builder: %s', \get_class($queryParameter)));
            }
            $this->query[] = $queryParameter;
        }
    }

    /**
     * @param string $queryParameter
     * @param $value
     *
     * @throws QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public function add(string $queryParameter, $value): self
    {
        $this->validate($queryParameter);
        $this->query[] = new $queryParameter($value);

        return $this;
    }

    /**
     * @param string $queryParameter
     *
     * @return QueryParameterInterface|null
     */
    public function get(string $queryParameter): ?QueryParameterInterface
    {
        foreach ($this->query as $item) {
            if ($item instanceof $queryParameter) {
                return $item;
            }
        }

        return null;
    }

    /**
     * @param string $queryParameter
     * @param $value
     *
     * @throws QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public function set(string $queryParameter, $value): self
    {
        $this->validate($queryParameter);
        $item = $this->get($queryParameter);
        if (!$item instanceof QueryParameterInterface) {
            throw new QueryBuilderException(sprintf('Query Parameter not found %s', $queryParameter));
        }

        $this->remove($queryParameter);

        return $this->add($queryParameter, $value);
    }

    /**
     * @param string $queryParameter
     *
     * @return QueryBuilder
     */
    public function remove(string $queryParameter): self
    {
        foreach ($this->query as $index => $item) {
            if ($item instanceof $queryParameter) {
                array_splice($this->query, $index, 1);

                return $this;
            }
        }

        return $this;
    }

    /**
     * @param string $queryParameter
     *
     * @return bool
     */
    public function has(string $queryParameter): bool
    {
        foreach ($this->query as $item) {
            if ($item instanceof $queryParameter) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return string
     *
     * Only create query params for items that are not null
     */
    public function toQueryString(): string
    {
        $arr = [];
        foreach ($this->query as $item) {
            if (null === $item->getValue()) {
                continue;
            }

            $arr[$item->getKey()] = $item->getValue();
        }

        return http_build_query($arr);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $arr = [];
        foreach ($this->query as $item) {
            if (null === $item->getValue()) {
                continue;
            }

            $arr[$item->getKey()] = $item->getValue();
        }

        return $arr;
    }

    /**
     * @param string $queryParameter
     *
     * @throws QueryBuilderException
     * @throws \ReflectionException
     */
    private function validate(string $queryParameter)
    {
        $class = new \ReflectionClass($queryParameter);
        if (!$class->implementsInterface(QueryParameterInterface::class)) {
            throw new QueryBuilderException(sprintf('Invalid Query Parameter class passed to "add" function: %s - Class must implement %s', $queryParameter, QueryParameterInterface::class));
        }
    }
}
