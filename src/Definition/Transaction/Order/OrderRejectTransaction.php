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
use Mab05k\OandaClient\Definition\Traits\PartialFillTrait;
use Mab05k\OandaClient\Definition\Traits\PositionFillTrait;
use Mab05k\OandaClient\Definition\Traits\PriceBoundTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\ReasonTrait;
use Mab05k\OandaClient\Definition\Traits\RejectReasonTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeCloseTrait;
use Mab05k\OandaClient\Definition\Traits\TriggerConditionTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;

/**
 * Class OrderRejectTransaction.
 */
class OrderRejectTransaction implements OrderTransactionInterface
{
    use ClientExtensionsTrait;
    use InstrumentTrait;
    use OrderTransactionTrait;
    use PartialFillTrait;
    use PositionFillTrait;
    use PriceBoundTrait;
    use PriceTrait;
    use ReasonTrait;
    use RejectReasonTrait;
    use TimeInForceTrait;
    use TradeCloseTrait;
    use TriggerConditionTrait;
    use TypeTrait;
    use UnitTrait;
}
