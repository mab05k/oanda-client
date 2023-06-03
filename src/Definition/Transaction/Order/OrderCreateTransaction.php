<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\PositionFillTrait;
use Mab05k\OandaClient\Definition\Traits\PriceBoundTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\ReasonTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeCloseTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\TriggerConditionTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;

/**
 * Class OrderCreateTransaction.
 */
class OrderCreateTransaction implements OrderTransactionInterface
{
    use ClientExtensionsTrait;
    use InstrumentTrait;
    use OrderTransactionTrait;
    use PositionFillTrait;
    use PriceBoundTrait;
    use PriceTrait;
    use ReasonTrait;
    use TimeInForceTrait;
    use TradeCloseTrait;
    use TradeIdTrait;
    use TriggerConditionTrait;
    use TypeTrait;
    use UnitTrait;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("guaranteed")
     *
     * @Serializer\Type("boolean")
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
     * @return OrderCreateTransaction
     */
    public function setGuaranteed(?bool $guaranteed): self
    {
        $this->guaranteed = $guaranteed;

        return $this;
    }
}
