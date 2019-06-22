<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait TradeIdTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TradeIdTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("tradeID")
     */
    private $tradeId;

    /**
     * @return string|null
     */
    public function getTradeId(): ?string
    {
        return $this->tradeId;
    }

    /**
     * @param string|null $tradeId
     *
     * @return $this
     */
    public function setTradeId(?string $tradeId)
    {
        $this->tradeId = $tradeId;

        return $this;
    }
}
