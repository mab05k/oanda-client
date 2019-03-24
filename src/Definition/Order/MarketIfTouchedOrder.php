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
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\CancelledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\CreateTimeTrait;
use Mab05k\OandaClient\Definition\Traits\FilledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\ReplacedOrderTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Request\Order\MarketIfTouchedOrderRequest;

/**
 * Class MarketIfTouchedOrder.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class MarketIfTouchedOrder extends MarketIfTouchedOrderRequest
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
     * @Serializer\SerializedName("initialMarketPrice")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $initialMarketPrice;

    /**
     * @return Money|null
     */
    public function getInitialMarketPrice(): ?Money
    {
        return $this->initialMarketPrice;
    }

    /**
     * @param Money|null $initialMarketPrice
     *
     * @return MarketIfTouchedOrder
     */
    public function setInitialMarketPrice(?Money $initialMarketPrice): self
    {
        $this->initialMarketPrice = $initialMarketPrice;

        return $this;
    }
}
