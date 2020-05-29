<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Http\Message\MessageFactory;
use Http\Message\UriFactory;
use JMS\Serializer\SerializerInterface;
use Mab05k\OandaClient\Account\Account;
use Mab05k\OandaClient\Account\AccountDiscriminator;
use Mab05k\OandaClient\Exception\InvalidStatusCodeException;
use Mab05k\OandaClient\Exception\ResponseDeserializationException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Psr\Log\LoggerInterface;

/**
 * Class AbstractClient.
 */
class AbstractOandaClient
{
    /**
     * @var AccountDiscriminator
     */
    private $accountDiscriminator;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * @var UriFactory
     */
    private $uriFactory;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * @var Account|null
     */
    private $account;

    /**
     * AbstractOandaClient constructor.
     *
     * @param AccountDiscriminator $accountDiscriminator
     * @param ClientInterface      $client
     * @param MessageFactory       $mesasageFactory
     * @param UriFactory           $uriFactory
     * @param SerializerInterface  $serializer
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        AccountDiscriminator $accountDiscriminator,
        ClientInterface $client,
        MessageFactory $mesasageFactory,
        UriFactory $uriFactory,
        SerializerInterface $serializer,
        LoggerInterface $logger = null
    ) {
        $this->accountDiscriminator = $accountDiscriminator;
        $this->client = $client;
        $this->messageFactory = $mesasageFactory;
        $this->uriFactory = $uriFactory;
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    /**
     * @param Account|string $account
     */
    public function setAccount($account)
    {
        if ($account instanceof Account) {
            $this->account = $account;

            return;
        }

        $this->account = $this->accountDiscriminator->getAccount($account);
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\ConfigurationException
     *
     * @return Account
     */
    public function getAccount(): Account
    {
        if (null === $this->account) {
            $this->account = $this->accountDiscriminator->getDefaultAccount();
        }

        return $this->account;
    }

    /**
     * @param RequestInterface $request
     * @param string           $deserializationType
     * @param int              $expectedStatusCode
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * @return array|\JMS\Serializer\scalar|object
     */
    public function sendRequest(
        RequestInterface $request,
        string $deserializationType,
        int $expectedStatusCode
    ) {
        try {
            $response = $this->client->sendRequest($request);
            $this->validateResponseCode($response, $expectedStatusCode);

            return $this->deserializeResponse($response, $deserializationType);
        } catch (InvalidStatusCodeException $ex) {
            if ($this->logger instanceof LoggerInterface) {
                $this->logger->error($ex->getMessage(), [
                    'deserializationType' => $deserializationType,
                    'method' => $request->getMethod(),
                    'path' => $request->getUri()->getPath(),
                    'query' => $request->getUri()->getQuery(),
                ]);
            }
            throw $ex;
        } catch (\Throwable | \Http\Client\Exception $ex) {
            if ($this->logger instanceof LoggerInterface) {
                $this->logger->critical('Unexpected Request Exception.', [
                    'deserializationType' => $deserializationType,
                    'exception' => $ex->getMessage(),
                    'method' => $request->getMethod(),
                    'path' => $request->getUri()->getPath(),
                    'query' => $request->getUri()->getQuery(),
                ]);
            }

            throw $ex;
        }
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $headers
     * @param null   $body
     * @param array  $queryParameters
     *
     * @return RequestInterface
     */
    public function createRequest(
        string $method,
        string $path,
        $body = null,
        array $queryParameters = [],
        array $headers = []
    ): RequestInterface {
        $uri = $this->createUri($path, $queryParameters);
        if (null !== $body) {
            $body = $this->serializer->serialize($body, 'json');
        }

        return $this->messageFactory->createRequest(
            $method,
            $uri,
            $this->addAuthHeader($headers),
            $body
        );
    }

    /**
     * @param ResponseInterface $response
     * @param int               $expectedStatusCode
     */
    protected function validateResponseCode(
        ResponseInterface $response,
        int $expectedStatusCode
    ) {
        if ($expectedStatusCode !== $response->getStatusCode()) {
            $this->logger->warning(sprintf('Invalid status code. Expected %d, got %d', $expectedStatusCode, $response->getStatusCode()));
        }
    }

    /**
     * @param string $path
     * @param array  $queryParameters
     *
     * @return UriInterface
     */
    private function createUri(string $path, array $queryParameters): UriInterface
    {
        if (preg_match('/\/accounts\/%s/', $path)) {
            $path = sprintf($path, $this->getAccount()->getId());
        }

        return $this->uriFactory->createUri($path)->withQuery(http_build_query($queryParameters));
    }

    /**
     * @param array $headers
     *
     * @return array
     */
    private function addAuthHeader(array $headers): array
    {
        if (!isset($headers['Authorization'])) {
            $headers['Authorization'] = sprintf('Bearer %s', $this->getAccount()->getSecret());
        }

        return $headers;
    }

    /**
     * @param ResponseInterface $response
     * @param string            $deserializationType
     *
     * @throws ResponseDeserializationException
     *
     * @return array|\JMS\Serializer\scalar|object
     */
    private function deserializeResponse(
        ResponseInterface $response,
        string $deserializationType
    ) {
        try {
            $contents = $response->getBody()->getContents();
            $result = $this->serializer->deserialize($contents, $deserializationType, 'json');
            if (!$result instanceof $deserializationType) {
                throw new ResponseDeserializationException(sprintf('Deserialization Resulted in an incorrect object instance. Expected %s, got %s', $deserializationType, \get_class($result)), 2002);
            }

            return $result;
        } catch (\Throwable $throwable) {
            if ($this->logger instanceof LoggerInterface) {
                $this->logger->critical('Deserialization failed.', [
                    'deserializationType' => $deserializationType,
                    'exception' => $throwable->getMessage(),
                ]);
            }
            throw new ResponseDeserializationException(sprintf('Deserialization of %s failed: %s', $deserializationType, $throwable->getMessage()), 2001, $throwable);
        }
    }
}
