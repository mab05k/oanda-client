<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Mab05k\OandaClient\Client\InstrumentClient;
use Mab05k\OandaClient\Definition\Instrument\BookBucket;
use Mab05k\OandaClient\Definition\Instrument\Candle;
use Mab05k\OandaClient\Definition\Instrument\OrderBook;
use Mab05k\OandaClient\Definition\Instrument\PositionBook;
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
use Mab05k\OandaClient\Request\Query\OrderBook\Time as OrderBookTime;
use Mab05k\OandaClient\Request\Query\PositionBook\Time as PositionBookTime;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;

class InstrumentClientTest extends AbstractClientTest
{
    /**
     * @var InstrumentClient
     */
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();

        $this->SUT = new InstrumentClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \Http\Client\Exception
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testCandles()
    {
        $this->createMockResponse(200, 'instrument/candles.json');
        $candleOptions = QueryBuilderFactory::candleOptions()
            ->set(Price::class, Price::M)
            ->set(CandlestickGranularity::class, CandlestickGranularity::S5)
            ->set(Count::class, 100)
            ->set(From::class, new \DateTime('now'))
            ->set(To::class, new \DateTime('now'))
            ->set(Smooth::class, false)
            ->set(IncludeFirst::class, true)
            ->set(DailyAlignment::class, 17)
            ->set(AlignmentTimezone::class, 'America/New_York')
            ->set(WeeklyAlignment::class, WeeklyAlignment::FRIDAY);

        $result = $this->SUT->candles('GBP_USD', $candleOptions);
        $this->assertInstanceOf(Candle::class, $result);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \Http\Client\Exception
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testOrderBook()
    {
        $this->createMockResponse(200, 'instrument/orderBook.json');
        $orderBookOptions = QueryBuilderFactory::orderBookOptions()
            ->set(OrderBookTime::class, new \DateTime('now'));

        $result = $this->SUT->orderBook('EUR_USD', $orderBookOptions);
        $orderBook = $result->getOrderBook();
        $this->assertInstanceOf(OrderBook::class, $result);
        $this->assertInstanceOf(\DateTime::class, $orderBook->getTime());
        $this->assertEquals('EUR_USD', $orderBook->getInstrument());
        $this->assertEquals(1.13224, $orderBook->getPrice()->getAmount()->toFloat());
        $this->assertEquals(0.0005, $orderBook->getBucketWidth()->getAmount()->toFloat());

        $buckets = $orderBook->getBuckets();
        $this->assertInstanceOf(BookBucket::class, $buckets[0]);
        $this->assertEquals(0.0005, $buckets[1]->getPrice()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $buckets[1]->getLongCountPercent()->toFloat());
        $this->assertEquals(0.0025, $buckets[1]->getShortCountPercent()->toFloat());
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \Http\Client\Exception
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testPositionBook()
    {
        $this->createMockResponse(200, 'instrument/positionBook.json');
        $positionBookOptions = QueryBuilderFactory::positionBookOptions()
            ->set(PositionBookTime::class, new \DateTime('now'));

        $result = $this->SUT->positionBook('EUR_USD', $positionBookOptions);
        $this->assertInstanceOf(PositionBook::class, $result);

        $positionBook = $result->getPositionBook();
        $this->assertInstanceOf(PositionBook::class, $result);
        $this->assertInstanceOf(\DateTime::class, $positionBook->getTime());
        $this->assertEquals('EUR_USD', $positionBook->getInstrument());
        $this->assertEquals(1.13224, $positionBook->getPrice()->getAmount()->toFloat());
        $this->assertEquals(0.0005, $positionBook->getBucketWidth()->getAmount()->toFloat());

        $buckets = $positionBook->getBuckets();
        $this->assertInstanceOf(BookBucket::class, $buckets[0]);
        $this->assertEquals(1.0355, $buckets[1]->getPrice()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $buckets[1]->getLongCountPercent()->toFloat());
        $this->assertEquals(0.0028, $buckets[1]->getShortCountPercent()->toFloat());
    }
}
