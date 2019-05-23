<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query;

use Mab05k\OandaClient\Request\Query\Account\SinceTransactionId;
use Mab05k\OandaClient\Request\Query\Candle\AlignmentTimezone;
use Mab05k\OandaClient\Request\Query\Candle\CandlestickGranularity;
use Mab05k\OandaClient\Request\Query\Candle\Count;
use Mab05k\OandaClient\Request\Query\Candle\DailyAlignment;
use Mab05k\OandaClient\Request\Query\Candle\From;
use Mab05k\OandaClient\Request\Query\Candle\IncludeFirst;
use Mab05k\OandaClient\Request\Query\Candle\Price;
use Mab05k\OandaClient\Request\Query\Candle\Smooth;
use Mab05k\OandaClient\Request\Query\Candle\To;
use Mab05k\OandaClient\Request\Query\Candle\WeeklyAlignment;
use Mab05k\OandaClient\Request\Query\Order\BeforeId;
use Mab05k\OandaClient\Request\Query\Order\Count as OrderCount;
use Mab05k\OandaClient\Request\Query\Order\Ids;
use Mab05k\OandaClient\Request\Query\Order\Instrument;
use Mab05k\OandaClient\Request\Query\Order\State;
use Mab05k\OandaClient\Request\Query\OrderBook\Time as OrderBookTime;
use Mab05k\OandaClient\Request\Query\PositionBook\Time as PositionBookTime;
use Mab05k\OandaClient\Request\Query\Pricing\IncludeHomeConversions;
use Mab05k\OandaClient\Request\Query\Pricing\IncludeUnitsAvailable;
use Mab05k\OandaClient\Request\Query\Pricing\Instruments;
use Mab05k\OandaClient\Request\Query\Pricing\Since;
use Mab05k\OandaClient\Request\Query\Pricing\Snapshot;
use Mab05k\OandaClient\Request\Query\Trade\BeforeId as TradeBeforeId;
use Mab05k\OandaClient\Request\Query\Trade\Count as TradeCount;
use Mab05k\OandaClient\Request\Query\Trade\Ids as TradeIds;
use Mab05k\OandaClient\Request\Query\Trade\Instrument as TradeInstrument;
use Mab05k\OandaClient\Request\Query\Trade\State as TradeState;
use Mab05k\OandaClient\Request\Query\Transaction\From as TransactionFrom;
use Mab05k\OandaClient\Request\Query\Transaction\Id as TransactionId;
use Mab05k\OandaClient\Request\Query\Transaction\PageSize as TransactionPageSize;
use Mab05k\OandaClient\Request\Query\Transaction\To as TransactionTo;
use Mab05k\OandaClient\Request\Query\Transaction\Type as TransactionType;

/**
 * Class QueryBuilderFactory.
 */
class QueryBuilderFactory
{
    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     *
     * @return QueryBuilder
     */
    public static function create(): QueryBuilder
    {
        return new QueryBuilder();
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function candleOptions(): QueryBuilder
    {
        return self::create()
            ->add(Price::class, null)
            ->add(CandlestickGranularity::class, null)
            ->add(Count::class, null)
            ->add(From::class, null)
            ->add(To::class, null)
            ->add(Smooth::class, null)
            ->add(IncludeFirst::class, null)
            ->add(DailyAlignment::class, null)
            ->add(AlignmentTimezone::class, null)
            ->add(WeeklyAlignment::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function orderBookOptions(): QueryBuilder
    {
        return self::create()
            ->add(OrderBookTime::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function positionBookOptions(): QueryBuilder
    {
        return self::create()
            ->add(PositionBookTime::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function orders(): QueryBuilder
    {
        return self::create()
            ->add(BeforeId::class, null)
            ->add(OrderCount::class, null)
            ->add(Ids::class, null)
            ->add(Instrument::class, null)
            ->add(State::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function pricing(): QueryBuilder
    {
        return self::create()
            ->add(IncludeHomeConversions::class, false)
            ->add(IncludeUnitsAvailable::class, true)
            ->add(Instruments::class, null)
            ->add(Since::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function pricingStream(): QueryBuilder
    {
        return self::create()
            ->add(Instruments::class, null)
            ->add(Snapshot::class, true);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function trade(): QueryBuilder
    {
        return self::create()
            ->add(TradeBeforeId::class, null)
            ->add(TradeCount::class, null)
            ->add(TradeIds::class, null)
            ->add(TradeInstrument::class, null)
            ->add(TradeState::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function transaction(): QueryBuilder
    {
        return self::create()
            ->add(TransactionFrom::class, null)
            ->add(TransactionId::class, null)
            ->add(TransactionPageSize::class, null)
            ->add(TransactionTo::class, null)
            ->add(TransactionType::class, null);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     *
     * @return QueryBuilder
     */
    public static function accountChanges(): QueryBuilder
    {
        return self::create()
            ->add(SinceTransactionId::class, null);
    }
}
