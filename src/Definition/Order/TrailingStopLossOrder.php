<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Order;

use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\CancelledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\CreateTimeTrait;
use Mab05k\OandaClient\Definition\Traits\FilledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\ReplacedOrderTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Request\Order\TrailingStopLossOrderRequest;

/**
 * Class TrailingStopLossOrder.
 */
class TrailingStopLossOrder extends TrailingStopLossOrderRequest
{
    use IdTrait;
    use CreateTimeTrait;
    use StateTrait;
    use FilledOrderTrait;
    use TradeStatusIdTrait;
    use CancelledOrderTrait;
    use ReplacedOrderTrait;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("trailingStopValue")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $trailingStopValue;

    /**
     * @return Money|null
     */
    public function getTrailingStopValue(): ?Money
    {
        return $this->trailingStopValue;
    }

    /**
     * @param Money|null $trailingStopValue
     *
     * @return TrailingStopLossOrder
     */
    public function setTrailingStopValue(?Money $trailingStopValue): self
    {
        $this->trailingStopValue = $trailingStopValue;

        return $this;
    }
}
