<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Definition\Pricing\Pricing;
use Mab05k\OandaClient\Request\Query\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PricingClient.
 */
class PricingClient extends AbstractOandaClient
{
    /**
     * @param QueryBuilder $queryBuilder
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get pricing information for a specified list of Instruments within an Account
     *
     * @return Pricing
     */
    public function pricing(QueryBuilder $queryBuilder): Pricing
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/pricing',
            null,
            $queryBuilder->toArray()
        );

        return $this->sendRequest($request, Pricing::class, 200);
    }
}
