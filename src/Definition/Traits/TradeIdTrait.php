<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use JMS\Serializer\Annotation as Serializer;

/**
 * Trait TradeIdTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TradeIdTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("tradeID")
     * @Serializer\Type("string")
     */
    private $tradeId;

    /**
     * @return int|null
     */
    public function getTradeId(): ?int
    {
        if (null === $this->tradeId) {
            return null;
        }

        return (int) ($this->tradeId);
    }

    /**
     * @param int|null $tradeId
     *
     * @return $this
     */
    public function setTradeId(?int $tradeId)
    {
        $this->tradeId = $tradeId;

        return $this;
    }
}
