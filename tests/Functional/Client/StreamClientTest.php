<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Mab05k\OandaClient\Client\StreamClient;
use Mab05k\OandaClient\Request\Query\Pricing\Instruments;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;
use Psr\Http\Message\StreamInterface;

/**
 * Class StreamClientTest.
 */
class StreamClientTest extends AbstractClientTest
{
    /**
     * @var StreamClient
     */
    private $SUT;

    public function setUp()
    {
        parent::setUp();

        $this->SUT = new StreamClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testPricingStream()
    {
        $this->createMockResponse(200, 'pricing/pricing.json');
        $pricingStreamOptions = QueryBuilderFactory::pricingStream()
            ->set(Instruments::class, [Instruments::EUR_USD]);

        $result = $this->SUT->pricingStream($pricingStreamOptions);
        $this->assertInstanceOf(StreamInterface::class, $result);
    }

    public function testTransactionStream()
    {
        $this->createMockResponse(200, 'transaction/transaction.json');

        $result = $this->SUT->transactionStream();
        $this->assertInstanceOf(StreamInterface::class, $result);
    }
}
