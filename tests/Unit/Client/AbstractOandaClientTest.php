<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Client;

use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use JMS\Serializer\SerializerInterface;
use Mab05k\OandaClient\Account\AccountDiscriminator;
use Mab05k\OandaClient\Client\AbstractOandaClient;
use Mab05k\OandaClient\Tests\Fixtures\DummyClient;
use Mab05k\OandaClient\Tests\Fixtures\DummyResponse;
use Phake;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractOandaClientTest.
 */
class AbstractOandaClientTest extends TestCase
{
    /**
     * @var AbstractOandaClient
     */
    private $SUT;
    /**
     * @Mock
     *
     * @var AccountDiscriminator
     */
    protected $accountDiscriminator;

    /**
     * @Mock
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * @Mock
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @Mock
     *
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @Mock
     *
     * @var MessageFactory
     */
    protected $guzzleMessageFactory;

    /**
     * @Mock
     *
     * @var UriFactory
     */
    protected $guzzleUriFactory;

    /**
     * @Mock
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * @Mock
     *
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @Mock
     *
     * @var StreamInterface
     */
    protected $stream;

    /**
     * @Mock
     *
     * @var UriInterface
     */
    protected $uri;

    public function setUp()
    {
        Phake::initAnnotations($this);

        $this->SUT = new DummyClient(
            $this->accountDiscriminator,
            $this->client,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );

        Phake::when($this->client)
            ->sendRequest(Phake::anyParameters())
            ->thenReturn($this->response);
        Phake::when($this->response)
            ->getBody()
            ->thenReturn($this->stream);
        Phake::when($this->request)
            ->getUri()
            ->thenReturn($this->uri);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     */
    public function testSendRequestInvalidDeserializationType()
    {
        $this->expectException(\Mab05k\OandaClient\Exception\ResponseDeserializationException::class);

        Phake::when($this->response)
            ->getStatusCode()
            ->thenReturn(200);
        Phake::when($this->stream)
            ->getContents()
            ->thenReturn(json_encode(['fail' => 1]));
        $this->assertNull($this->SUT->sendRequest($this->request, DummyResponse::class, 200));
        Phake::verify($this->logger, Phake::times(1))
            ->critical(Phake::anyParameters());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     */
    public function testSendRequestDeserializationException()
    {
        $this->expectException(\Mab05k\OandaClient\Exception\ResponseDeserializationException::class);

        Phake::when($this->response)
            ->getStatusCode()
            ->thenReturn(200);
        Phake::when($this->serializer)
            ->deserialize(Phake::anyParameters())
            ->thenThrow(new \Exception());
        $this->assertNull($this->SUT->sendRequest($this->request, DummyResponse::class, 200));
        Phake::verify($this->logger, Phake::times(1))
            ->critical(Phake::anyParameters());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     */
    public function testSendRequestClientException()
    {
        $this->expectException(\Exception::class);

        Phake::when($this->client)
            ->sendRequest(Phake::anyParameters())
            ->thenThrow(new \Exception());

        $this->assertNull($this->SUT->sendRequest($this->request, DummyResponse::class, 200));
        Phake::verify($this->logger, Phake::times(1))
            ->critical(Phake::anyParameters());
    }
}
