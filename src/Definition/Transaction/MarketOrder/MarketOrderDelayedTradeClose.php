<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\MarketOrder;

use Mab05k\OandaClient\Definition\Traits\ClientTradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;

/**
 * Class MarketOrderDelayedTradeClose.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class MarketOrderDelayedTradeClose
{
    use ClientTradeIdTrait;
    use TradeIdTrait;

    /**
     * @var string|null
     */
    private $sourceTransactionId;

    /**
     * @return string|null
     */
    public function getSourceTransactionId(): ?string
    {
        return $this->sourceTransactionId;
    }

    /**
     * @param string|null $sourceTransactionId
     *
     * @return MarketOrderDelayedTradeClose
     */
    public function setSourceTransactionId(?string $sourceTransactionId): self
    {
        $this->sourceTransactionId = $sourceTransactionId;

        return $this;
    }
}
