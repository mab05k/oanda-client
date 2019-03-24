<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Request\Query\QueryBuilder;
use Mab05k\OandaClient\Response\Transaction\TransactionResponse;
use Mab05k\OandaClient\Response\Transaction\TransactionsPagesResponse;
use Mab05k\OandaClient\Response\Transaction\TransactionsResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class TransactionClient.
 */
class TransactionClient extends AbstractOandaClient
{
    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a list of Transactions pages that satisfy a time-based Transaction query
     *
     * @return TransactionsPagesResponse
     */
    public function transactions(QueryBuilder $queryBuilder): TransactionsPagesResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/transactions',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, TransactionsPagesResponse::class, 200);
    }

    /**
     * @param string $transactionId
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get the details of a single Account Transaction
     *
     * @return TransactionResponse
     */
    public function transaction(string $transactionId): TransactionResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s'.sprintf('/transactions/%s', $transactionId)
        );

        return $this->sendRequest($request, TransactionResponse::class, 200);
    }

    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a range of Transactions for an Account based on the Transaction IDs
     *
     * @return TransactionsResponse
     */
    public function idRange(QueryBuilder $queryBuilder): TransactionsResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/transactions/idrange',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, TransactionsResponse::class, 200);
    }

    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a range of Transactions for an Account starting at (but not including) a provided Transaction ID
     *
     * @return TransactionsResponse
     */
    public function sinceId(QueryBuilder $queryBuilder): TransactionsResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/transactions/sinceid',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, TransactionsResponse::class, 200);
    }
}
