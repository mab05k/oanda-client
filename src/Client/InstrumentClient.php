<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Definition\Instrument\Candle;
use Mab05k\OandaClient\Definition\Instrument\OrderBook;
use Mab05k\OandaClient\Definition\Instrument\PositionBook;
use Mab05k\OandaClient\Request\Query\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

/**
 * Class InstrumentClient.
 */
class InstrumentClient extends AbstractOandaClient
{
    /**
     * @param string       $instrument
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Fetch candlestick data for an instrument
     *
     * @return Candle|null
     */
    public function candles(string $instrument, QueryBuilder $queryBuilder): ?Candle
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            sprintf('/instruments/%s/candles', $instrument),
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, Candle::class, 200);
    }

    /**
     * @param string       $instrument
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Fetch an order book for an instrument
     *
     * @return OrderBook|null
     */
    public function orderBook(string $instrument, QueryBuilder $queryBuilder): ?OrderBook
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            sprintf('/instruments/%s/orderBook', $instrument),
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, OrderBook::class, 200, [DateTimeNormalizer::FORMAT_KEY => \DateTime::ATOM]);
    }

    /**
     * @param string       $instrument
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Fetch a position book for an instrument
     *
     * @return PositionBook|null
     */
    public function positionBook(string $instrument, QueryBuilder $queryBuilder): ?PositionBook
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            sprintf('/instruments/%s/positionBook', $instrument),
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, PositionBook::class, 200, [DateTimeNormalizer::FORMAT_KEY => \DateTime::ATOM]);
    }
}
