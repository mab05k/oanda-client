<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Http\Message\MessageFactory\GuzzleMessageFactory;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use Http\Message\UriFactory\GuzzleUriFactory;
use Http\Mock\Client;
use Mab05k\OandaClient\Account\AccountDiscriminator;
use Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection\Configuration;
use Mab05k\OandaClient\Bridge\Symfony\Serializer\BigDecimalNormalizer;
use Mab05k\OandaClient\Bridge\Symfony\Serializer\MoneyNormalizer;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

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

    public function setUp()
    {
        $client = static::createClient();
        $this->mockClient = $client->getContainer()->get('httplug.client.mock');
        $this->accountDiscriminator = new AccountDiscriminator($this->accountsArray);
        $propertyInfoExtractor = new PhpDocExtractor();
        $normalizers = [
            new MoneyNormalizer(),
            new BigDecimalNormalizer(),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, $propertyInfoExtractor),
        ];
        $encoders = [new JsonEncoder()];
//        $this->serializer = new Serializer($normalizers, $encoders);
        $this->serializer = $client->getContainer()->get('serializer');
        $this->logger = \Phake::mock(LoggerInterface::class); // Logger('test');

        $this->guzzleMessageFactory = new GuzzleMessageFactory();
        $this->guzzleUriFactory = new GuzzleUriFactory();
    }

    /**
     * @param int    $statusCode
     * @param string $filepath
     */
    protected function createMockResponse(int $statusCode, string $filepath)
    {
        $response = $this->createMock(ResponseInterface::class);
        $responseFile = file_get_contents(__DIR__.'/../../Fixtures/response/'.$filepath);
        $stream = (new GuzzleStreamFactory())->createStream($responseFile);
        $response->method('getBody')->willReturn($stream);
        $response->method('getStatusCode')->willReturn($statusCode);
        $this->mockClient->addResponse($response);
    }
}
