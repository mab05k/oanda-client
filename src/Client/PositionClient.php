<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Client;

use Mab05k\OandaClient\Response\Position\PositionResponse;
use Mab05k\OandaClient\Response\Position\PositionsResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PositionClient.
 */
class PositionClient extends AbstractOandaClient
{
    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * List all Positions for an Account. The Positions returned are for every instrument that has had a position during the lifetime of an the Account.
     *
     * @return PositionsResponse|null
     */
    public function positions(): ?PositionsResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/positions'
        );

        return $this->sendRequest($request, PositionsResponse::class, 200);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * List all open Positions for an Account. An open Position is a Position in an Account that currently has a Trade opened for it.
     *
     * @return PositionsResponse|null
     */
    public function openPositions(): ?PositionsResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s/openPositions'
        );

        return $this->sendRequest($request, PositionsResponse::class, 200);
    }

    /**
     * @param string $instrument
     *
     * @throws \Http\Client\Exception
     * @throws \Throwable
     *
     * Get the details of a single Instrument’s Position in an Account. The Position may by open or not.
     *
     * @return PositionResponse|null
     */
    public function position(string $instrument): ?PositionResponse
    {
        $request = $this->createRequest(
            Request::METHOD_GET,
            '/accounts/%s'.sprintf('/positions/%s', $instrument)
        );

        return $this->sendRequest($request, PositionResponse::class, 200);
    }

    // TODO: implement PUT /accounts/{id}/positions/{instrument}/close
}
