<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

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
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class OrderCreateTransaction.
 */
class OrderCreateTransaction implements OrderTransactionInterface
{
    use TradeIdTrait;
    use TypeTrait;
    use UnitTrait;
    use PriceTrait;
    use PriceBoundTrait;
    use InstrumentTrait;
    use TimeInForceTrait;
    use PositionFillTrait;
    use ClientExtensionsTrait;
    use OrderTransactionTrait;
    use ReasonTrait;
    use TradeCloseTrait;
    use TriggerConditionTrait;

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
     * @return OrderCreateTransaction
     */
    public function setGuaranteed(?bool $guaranteed): self
    {
        $this->guaranteed = $guaranteed;

        return $this;
    }
}
