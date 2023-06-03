<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Http\Discovery\Psr17Factory;
use Http\Factory\Guzzle\UriFactory;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Http\Message\UriFactory\GuzzleUriFactory;
use Http\Mock\Client;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Mab05k\OandaClient\Account\AccountDiscriminator;
use Mab05k\OandaClient\Bridge\Jms\Handler\BigDecimalHandler;
use Mab05k\OandaClient\Bridge\Jms\Handler\BrickMoneyHandler;
use Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection\Configuration;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class AbstractClientTest.
 */
abstract class AbstractClientTest extends WebTestCase
{
    /**
     * @var AccountDiscriminator
     */
    protected $accountDiscriminator;

    /**
     * @var Client
     */
    protected $mockClient;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var GuzzleMessageFactory
     */
    protected $guzzleMessageFactory;

    /**
     * @var GuzzleUriFactory
     */
    protected $guzzleUriFactory;

    protected $accountsArray = [
        [
            Configuration::ACCOUNT_NAME => 'default_account',
            Configuration::ACCOUNT_ID => '000-000-0000000-000',
            Configuration::ACCOUNT_SECRET => 'super_secret',
        ],

        [
            Configuration::ACCOUNT_NAME => 'secondary_account',
            Configuration::ACCOUNT_ID => '000-000-0000000-001',
            Configuration::ACCOUNT_SECRET => 'super_secret_1',
        ],
    ];

    protected function setUp(): void
    {
        $client = static::createClient();
        $this->mockClient = $client->getContainer()->get('httplug.client.mock');
        $this->accountDiscriminator = new AccountDiscriminator($this->accountsArray);
        $this->serializer = SerializerBuilder::create()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new BrickMoneyHandler());
                $registry->registerSubscribingHandler(new BigDecimalHandler());
            })
            ->addDefaultHandlers()
            ->build();
        $this->logger = \Phake::mock(LoggerInterface::class); // Logger('test');

        $this->guzzleMessageFactory = new Psr17Factory();
        $this->guzzleUriFactory = new UriFactory();
    }

    /**
     * @param int    $statusCode
     * @param string $filepath
     */
    protected function createMockResponse(int $statusCode, string $filepath)
    {
        $response = $this->createMock(ResponseInterface::class);
        $responseFile = file_get_contents(__DIR__.'/../../Fixtures/response/'.$filepath);
        $stream = (new Psr17Factory())->createStream($responseFile);
        $response->method('getBody')->willReturn($stream);
        $response->method('getStatusCode')->willReturn($statusCode);
        $this->mockClient->addResponse($response);
    }
}
