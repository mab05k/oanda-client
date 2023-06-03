<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Brick\Math\BigDecimal;
use Mab05k\OandaClient\Client\PricingClient;
use Mab05k\OandaClient\Definition\Pricing\Price;
use Mab05k\OandaClient\Definition\Pricing\PriceBucket;
use Mab05k\OandaClient\Definition\Pricing\Pricing;
use Mab05k\OandaClient\Request\Query\Pricing\Instruments;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;

class PricingClientTest extends AbstractClientTest
{
    /**
     * @var PricingClient
     */
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();

        $this->SUT = new PricingClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testPricing()
    {
        $this->createMockResponse(200, 'pricing/pricing.json');
        $pricingOptions = QueryBuilderFactory::pricing()
            ->set(Instruments::class, [Instruments::EUR_USD]);

        $result = $this->SUT->pricing($pricingOptions);
        $this->assertInstanceOf(Pricing::class, $result);
        $this->assertInstanceOf(Price::class, $result->getPrice('EUR_USD'));
        $this->assertInstanceOf(\DateTime::class, $result->getTime());

        $prices = $result->getPrices();
        $this->assertCount(1, $prices);

        $price = $prices[0];
        $this->assertEquals('PRICE', $price->getType());
        $this->assertEquals('EUR_USD', $price->getInstrument());
        $this->assertInstanceOf(\DateTime::class, $price->getTime());
        $this->assertEquals(1.29335, $price->getCloseoutBid()->getAmount()->toFloat());
        $this->assertEquals(1.29495, $price->getCloseoutAsk()->getAmount()->toFloat());
        $this->assertEquals('non-tradeable', $price->getStatus());
        $this->assertFalse($price->getTradeable());

        $bids = $price->getBids();
        $this->assertCount(1, $bids);
        $this->assertInstanceOf(PriceBucket::class, $bids[0]);
        $bid = $price->getMaxBid();
        $this->assertEquals(1.2936, $bid->getPrice()->getAmount()->toFloat());
        $this->assertEquals(BigDecimal::of(10000000), $bid->getLiquidity());

        $asks = $price->getAsks();
        $this->assertCount(1, $asks);
        $this->assertInstanceOf(PriceBucket::class, $asks[0]);
        $ask = $price->getMinAsk();
        $this->assertEquals(1.2947, $ask->getPrice()->getAmount()->toFloat());
        $this->assertEquals(BigDecimal::of(10000000), $ask->getLiquidity());

        $unitsAvailable = $price->getUnitsAvailable();
        $this->assertInstanceOf(Price\UnitsAvailable::class, $unitsAvailable);
        $default = $unitsAvailable->getDefault();
        $this->assertInstanceOf(Price\UnitAvailable::class, $default);
    }
}
