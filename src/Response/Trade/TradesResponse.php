<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Trade;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Trade\Trade;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;

/**
 * Class TradesResponse.
 */
class TradesResponse
{
    use LastTransactionIdTrait;

    /**
     * @var array|Trade[]|null
     *
     * @Serializer\SerializedName("trades")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Trade\Trade>")
     */
    private $trades;

    /**
     * @return array|Trade[]|null
     */
    public function getTrades()
    {
        return $this->trades;
    }

    /**
     * @param array|Trade[]|null $trades
     *
     * @return TradesResponse
     */
    public function setTrades($trades)
    {
        $this->trades = $trades;

        return $this;
    }
}
