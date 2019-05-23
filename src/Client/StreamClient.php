<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Definition\Pricing\Price;
use Mab05k\OandaClient\Definition\Transaction\Transaction;
use Mab05k\OandaClient\Request\Query\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StreamClient.
 */
class StreamClient extends AbstractOandaClient
{
    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a stream of Account Prices starting from when the request is made.
     * This pricing stream does not include every single price created for the Account,
     * but instead will provide at most 4 prices per second (every 250 milliseconds)
     * for each instrument being requested. If more than one price is created for an
     * instrument during the 250 millisecond window, only the price in effect at the
     * end of the window is sent. This means that during periods of rapid price movement,
     * subscribers to this stream will not be sent every price. Pricing windows for
     * different connections to the price stream are not all aligned in the same way
     * (i.e. they are not all aligned to the top of the second). This means that during
     * periods of rapid price movement, different subscribers may observe different
     * prices depending on their alignment.
     * Note: This endpoint is served by the streaming URLs.
     *
     * @return Price|null
     */
    public function pricingStream(QueryBuilder $queryBuilder): ?Price
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/pricing/stream',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, Price::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a stream of Transactions for an Account starting from when the request is made.
     * Note: This endpoint is served by the streaming URLs.
     *
     * @return Transaction|null
     */
    public function transactionStream(): ?Transaction
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/transactions/stream'
        );

        return $this->sendRequest($request, Transaction::class, 200);
    }
}
