<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Definition\Transaction\Order\OrderTransactionResponse;
use Mab05k\OandaClient\Request\Query\QueryBuilder;
use Mab05k\OandaClient\Request\Trade\CloseTradeRequest;
use Mab05k\OandaClient\Response\Trade\TradeResponse;
use Mab05k\OandaClient\Response\Trade\TradesResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TradeClient.
 */
class TradeClient extends AbstractOandaClient
{
    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a list of Trades for an Account
     *
     * @return TradesResponse|null
     */
    public function trades(QueryBuilder $queryBuilder): ?TradesResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/trades',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, TradesResponse::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get the list of open Trades for an Account
     *
     * @return TradesResponse|null
     */
    public function openTrades(): ?TradesResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/openTrades'
        );

        return $this->sendRequest($request, TradesResponse::class, 200);
    }

    /**
     * @param string $tradeSpecifier
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get the details of a specific Trade in an Account
     *
     * @return TradeResponse|null
     */
    public function trade(string $tradeSpecifier): ?TradeResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s'.sprintf('/trades/%s', $tradeSpecifier)
        );

        return $this->sendRequest($request, TradeResponse::class, 200);
    }

    /**
     * @param string            $tradeSpecifier
     * @param CloseTradeRequest $closeTradeRequest
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Close (partially or fully) a specific open Trade in an Account
     *
     * @return OrderTransactionResponse|null
     */
    public function close(string $tradeSpecifier, CloseTradeRequest $closeTradeRequest): ?OrderTransactionResponse
    {
        $request = $this->createRequest(
            Request::METHOD_PUT,
            '/accounts/%s'.sprintf('/trades/%s/close', $tradeSpecifier),
            $closeTradeRequest
        );

        return $this->sendRequest($request, OrderTransactionResponse::class, 200);
    }
}
