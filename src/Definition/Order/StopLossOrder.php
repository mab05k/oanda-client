<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Order;

use Brick\Math\BigDecimal;
use Mab05k\OandaClient\Definition\Traits\CancelledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\CreateTimeTrait;
use Mab05k\OandaClient\Definition\Traits\FilledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\ReplacedOrderTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Request\Order\StopLossOrderRequest;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class StopLossOrder.
 */
class StopLossOrder extends StopLossOrderRequest
{
    use IdTrait;
    use CreateTimeTrait;
    use StateTrait;
    use FilledOrderTrait;
    use TradeStatusIdTrait;
    use CancelledOrderTrait;
    use ReplacedOrderTrait;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("guaranteedExecutionPremium")
     */
    private $guaranteedExecutionPremium;

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getGuaranteedExecutionPremium(): ?BigDecimal
    {
        return $this->guaranteedExecutionPremium;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $guaranteedExecutionPremium
     *
     * @return StopLossOrder
     */
    public function setGuaranteedExecutionPremium(?BigDecimal $guaranteedExecutionPremium): self
    {
        $this->guaranteedExecutionPremium = $guaranteedExecutionPremium;

        return $this;
    }
}
