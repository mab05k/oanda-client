<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Client;

use JMS\Serializer\SerializerInterface;
use Mab05k\OandaClient\Account\AccountDiscriminator;
use Mab05k\OandaClient\Client\AbstractOandaClient;
use Mab05k\OandaClient\Tests\Fixtures\DummyClient;
use Mab05k\OandaClient\Tests\Fixtures\DummyResponse;
use Phake\Mock;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractOandaClientTest.
 */
class AbstractOandaClientTest extends TestCase
{
    private AbstractOandaClient $SUT;

    #[Mock(AccountDiscriminator::class)]
    protected AccountDiscriminator $accountDiscriminator;

    #[Mock(ClientInterface::class)]
    protected ClientInterface $client;

    #[Mock(LoggerInterface::class)]
    protected LoggerInterface $logger;

    #[Mock(SerializerInterface::class)]
    protected SerializerInterface $serializer;

    #[Mock(ResponseFactoryInterface::class)]
    protected ResponseFactoryInterface $guzzleMessageFactory;

    #[Mock(UriFactoryInterface::class)]
    protected UriFactoryInterface $guzzleUriFactory;

    #[Mock(RequestInterface::class)]
    protected RequestInterface $request;

    #[Mock(ResponseInterface::class)]
    protected ResponseInterface $response;

    #[Mock(StreamInterface::class)]
    protected StreamInterface $stream;

    #[Mock(UriInterface::class)]
    protected UriInterface $uri;

    protected function setUp(): void
    {
        \Phake::initAnnotations($this);

        $this->SUT = new DummyClient(
            $this->accountDiscriminator,
            $this->client,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );

        \Phake::when($this->client)
            ->sendRequest(\Phake::anyParameters())
            ->thenReturn($this->response);
        \Phake::when($this->response)
            ->getBody()
            ->thenReturn($this->stream);
        \Phake::when($this->request)
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

        \Phake::when($this->response)
            ->getStatusCode()
            ->thenReturn(200);
        \Phake::when($this->stream)
            ->getContents()
            ->thenReturn(json_encode(['fail' => 1]));
        $this->assertNull($this->SUT->sendRequest($this->request, DummyResponse::class, 200));
        \Phake::verify($this->logger, \Phake::times(1))
            ->critical(\Phake::anyParameters());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     */
    public function testSendRequestDeserializationException()
    {
        $this->expectException(\Mab05k\OandaClient\Exception\ResponseDeserializationException::class);

        \Phake::when($this->response)
            ->getStatusCode()
            ->thenReturn(200);
        \Phake::when($this->serializer)
            ->deserialize(\Phake::anyParameters())
            ->thenThrow(new \Exception());
        $this->assertNull($this->SUT->sendRequest($this->request, DummyResponse::class, 200));
        \Phake::verify($this->logger, \Phake::times(1))
            ->critical(\Phake::anyParameters());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     */
    public function testSendRequestClientException()
    {
        $this->expectException(\Exception::class);

        \Phake::when($this->client)
            ->sendRequest(\Phake::anyParameters())
            ->thenThrow(new \Exception());

        $this->assertNull($this->SUT->sendRequest($this->request, DummyResponse::class, 200));
        \Phake::verify($this->logger, \Phake::times(1))
            ->critical(\Phake::anyParameters());
    }
}
