<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Order;

use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\CreateTimeTrait;
use Mab05k\OandaClient\Definition\Traits\FilledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\PartialFillTrait;
use Mab05k\OandaClient\Definition\Traits\PositionFillTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Definition\Traits\TriggerConditionTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Order.
 */
class Order
{
    use IdTrait;
    use CreateTimeTrait;
    use TradeIdTrait;
    use StateTrait;
    use ClientExtensionsTrait;
    use TypeTrait;
    use InstrumentTrait;
    use UnitTrait;
    use TimeInForceTrait;
    use PositionFillTrait;
    use FilledOrderTrait;
    use PriceTrait;
    use PartialFillTrait;
    use TriggerConditionTrait;
    use TradeStatusIdTrait;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("guaranteed")
     */
    private $guaranteed;

    /**
     * @return bool|null
     */
    public function getGuaranteed(): ?bool
    {
        return $this->guaranteed;
    }

    /**
     * @param bool|null $guaranteed
     *
     * @return Order
     */
    public function setGuaranteed(?bool $guaranteed): self
    {
        $this->guaranteed = $guaranteed;

        return $this;
    }
}
