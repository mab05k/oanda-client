<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Trade;

use Mab05k\OandaClient\Definition\Trade\Trade;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class TradesResponse.
 */
class TradesResponse
{
    use LastTransactionIdTrait;

    /**
     * @var Trade[]|null
     *
     * @Serializer\SerializedName("trades")
     */
    private $trades;

    /**
     * @return Trade[]|null
     */
    public function getTrades()
    {
        return $this->trades;
    }

    /**
     * @param Trade[]|null $trades
     *
     * @return TradesResponse
     */
    public function setTrades($trades)
    {
        $this->trades = $trades;

        return $this;
    }
}
