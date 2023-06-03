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
 * Class TradeResponse.
 */
class TradeResponse
{
    use LastTransactionIdTrait;

    /**
     * @var Trade|null
     *
     * @Serializer\SerializedName("trade")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Trade\Trade")
     */
    private $trade;

    /**
     * @return Trade|null
     */
    public function getTrade(): ?Trade
    {
        return $this->trade;
    }

    /**
     * @param Trade|null $trade
     *
     * @return TradeResponse
     */
    public function setTrade(?Trade $trade): self
    {
        $this->trade = $trade;

        return $this;
    }
}
