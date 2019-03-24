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
use Mab05k\OandaClient\Definition\Transaction\Trade\TradeOpened;

/**
 * Trait TradeOpenedTrait.
 */
trait TradeOpenedTrait
{
    /**
     * @var TradeOpened|null
     *
     * @Serializer\SerializedName("tradeOpened")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Trade\TradeOpened")
     */
    private $tradeOpened;

    /**
     * @return TradeOpened|null
     */
    public function getTradeOpened(): ?TradeOpened
    {
        return $this->tradeOpened;
    }

    /**
     * @param TradeOpened|null $tradeOpened
     *
     * @return $this
     */
    public function setTradeOpened(?TradeOpened $tradeOpened)
    {
        $this->tradeOpened = $tradeOpened;

        return $this;
    }
}
