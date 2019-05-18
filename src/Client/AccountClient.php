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
use Mab05k\OandaClient\Definition\Account\AccountCollection;
use Mab05k\OandaClient\Definition\Account\Configuration;
use Mab05k\OandaClient\Definition\Transaction\Account\Configuration as ConfigurationTransaction;
use Mab05k\OandaClient\Request\Query\Account\SinceTransactionId;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;
use Mab05k\OandaClient\Response\Account\AccountChangesResponse;
use Mab05k\OandaClient\Response\Account\AccountResponse;
use Mab05k\OandaClient\Response\Account\AccountSummaryResponse;
use Mab05k\OandaClient\Response\Account\InstrumentResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AccountClient.
 */
class AccountClient extends AbstractOandaClient
{
    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a list of all Accounts authorized for the provided token
     *
     * @return AccountCollection|null
     */
    public function accounts(): ?AccountCollection
    {
        $request = $this->createRequest(Request::METHOD_GET, '/accounts');

        return $this->sendRequest($request, AccountCollection::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get the full details for a single Account that a client has access to.
     * Full pending Order, open Trade and open Position representations are provided.
     *
     * @return AccountResponse|null
     */
    public function account(): ?AccountResponse
    {
        $request = $this->createRequest(Request::METHOD_GET, '/accounts/%s');

        return $this->sendRequest($request, AccountResponse::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get a summary for a single Account that a client has access to
     *
     * @return AccountSummaryResponse|null
     */
    public function accountSummary(): ?AccountSummaryResponse
    {
        $request = $this->createRequest(Request::METHOD_GET, '/accounts/%s/summary');

        return $this->sendRequest($request, AccountSummaryResponse::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get the list of tradeable instruments for the given Account.
     * The list of tradeable instruments is dependent on the regulatory division that the Account is located in,
     * thus should be the same for all Accounts owned by a single user.
     *
     * @return InstrumentResponse|null
     */
    public function instruments(): ?InstrumentResponse
    {
        $request = $this->createRequest(Request::METHOD_GET, '/accounts/%s/instruments');

        return $this->sendRequest($request, InstrumentResponse::class, 200);
    }

    /**
     * @param Configuration $configuration
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Set the client-configurable portions of an Account
     *
     * @return ConfigurationTransaction|null
     */
    public function configuration(Configuration $configuration): ?ConfigurationTransaction
    {
        $request = $this->createRequest(Request::METHOD_PATCH, '/accounts/%s/configuration', $configuration);

        return $this->sendRequest($request, ConfigurationTransaction::class, 200);
    }

    /**
     * @param int $sinceTransactionId
     *
     * @throws \Http\Client\Exception
     * @throws \Mab05k\OandaClient\Exception\QueryBuilderException
     * @throws \ReflectionException
     * @throws \Throwable
     *
     * @return AccountChangesResponse|null
     */
    public function changes(int $sinceTransactionId): ?AccountChangesResponse
    {
        $queryBuilder = QueryBuilderFactory::accountChanges()->set(SinceTransactionId::class, $sinceTransactionId);
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/changes',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, AccountChangesResponse::class, 200);
    }
}
