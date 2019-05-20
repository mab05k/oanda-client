<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Account\Account;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderTransactionResponse;
use Mab05k\OandaClient\Request\Order\Envelope\OrderInterface;
use Mab05k\OandaClient\Request\Order\OrderClientExtensionsRequest;
use Mab05k\OandaClient\Request\Query\QueryBuilder;
use Mab05k\OandaClient\Response\Order\OrderClientExtensionsResponse;
use Mab05k\OandaClient\Response\Order\OrderResponse;
use Mab05k\OandaClient\Response\Order\OrdersResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OrderClient.
 */
class OrderClient extends AbstractOandaClient
{
    /**
     * @param OrderInterface $order
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Create an Order for an Account
     *
     * @return OrderTransactionResponse|null
     */
    public function create(OrderInterface $order): ?OrderTransactionResponse
    {
        $request = $this->createRequest(
            Request::METHOD_POST,
            '/accounts/%s/orders',
            $order
        );

        return $this->sendRequest($request, OrderTransactionResponse::class, 201);
    }

    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a list of Orders for an Account
     *
     * @return OrdersResponse|null
     */
    public function orders(QueryBuilder $queryBuilder): ?OrdersResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/orders',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, OrdersResponse::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * List all pending Orders in an Account
     *
     * @return OrdersResponse|null
     */
    public function pendingOrders(): ?OrdersResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/pendingOrders'
        );

        return $this->sendRequest($request, OrdersResponse::class, 200);
    }

    /**
     * @param string $orderSpecifier
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get details for a single Order in an Account
     *
     * @return OrderResponse|null
     */
    public function order(string $orderSpecifier): ?OrderResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s'.sprintf('/orders/%s', $orderSpecifier)
        );

        return $this->sendRequest($request, OrderResponse::class, 200);
    }

    /**
     * @param string $orderSpecifier
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Cancel a pending Order in an Account
     *
     * @return OrderTransactionResponse|null
     */
    public function cancel(string $orderSpecifier): ?OrderTransactionResponse
    {
        $request = $this->createRequest(
            Request::METHOD_PUT,
            '/accounts/%s'.sprintf('/orders/%s/cancel', $orderSpecifier)
        );

        return $this->sendRequest($request, OrderTransactionResponse::class, 200);
    }

    /**
     * @param string         $orderSpecifier
     * @param OrderInterface $order
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Replace an Order in an Account by simultaneously cancelling it and creating a replacement Order
     *
     * @return OrderTransactionResponse|null
     */
    public function replace(string $orderSpecifier, OrderInterface $order): ?OrderTransactionResponse
    {
        $request = $this->createRequest(
            Request::METHOD_PUT,
            '/accounts/%s'.sprintf('/orders/%s', $orderSpecifier),
            $order
        );

        return $this->sendRequest($request, OrderTransactionResponse::class, 201);
    }

    /**
     * @param string                       $orderSpecifier
     * @param OrderClientExtensionsRequest $orderClientExtensionsRequest
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Update the Client Extensions for an Order in an Account. Do not set, modify, or delete clientExtensions if your account is associated with MT4.
     *
     * @return OrderClientExtensionsResponse|null
     */
    public function clientExtensions(string $orderSpecifier, OrderClientExtensionsRequest $orderClientExtensionsRequest): ?OrderClientExtensionsResponse
    {
        $request = $this->createRequest(
            Request::METHOD_PUT,
            '/accounts/%s'.sprintf('/orders/%s/clientExtensions', $orderSpecifier),
            $orderClientExtensionsRequest
        );

        return $this->sendRequest($request, OrderClientExtensionsResponse::class, 200);
    }
}
