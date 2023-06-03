<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Fixtures;

use Mab05k\OandaClient\Client\AbstractOandaClient;

/**
 * Class DummyClient.
 */
class DummyClient extends AbstractOandaClient
{
    public function testCall()
    {
        $request = $this->createRequest('GET', '/accounts/%s'.sprintf('/test/%s', 'yes'));

        return $this->sendRequest($request, AccountCollection::class, 200);
    }
}
