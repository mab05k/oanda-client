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
use Mab05k\OandaClient\Request\Query\QueryBuilder;
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

    // TODO: implement PUT /v3/accounts/{accountID}/orders/{orderSpecifier}
    // TODO: implement PUT /v3/accounts/{accountID}/orders/{orderSpecifier}/clientExtensions
//    public function replace
//    public function clientExtensions
}
