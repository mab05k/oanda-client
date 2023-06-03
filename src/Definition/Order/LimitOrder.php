<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Order;

use Mab05k\OandaClient\Definition\Traits\CancelledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\CreateTimeTrait;
use Mab05k\OandaClient\Definition\Traits\FilledOrderTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\ReplacedOrderTrait;
use Mab05k\OandaClient\Definition\Traits\StateTrait;
use Mab05k\OandaClient\Definition\Traits\StopLossOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TakeProfitOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TradeClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Definition\Traits\TrailingStopLossOnFillTrait;
use Mab05k\OandaClient\Request\Order\LimitOrderRequest;

/**
 * Class LimitOrder.
 */
class LimitOrder extends LimitOrderRequest
{
    use CancelledOrderTrait;
    use CreateTimeTrait;
    use FilledOrderTrait;
    use IdTrait;
    use ReplacedOrderTrait;
    use StateTrait;
    use StopLossOnFillTrait;
    use TakeProfitOnFillTrait;
    use TradeClientExtensionsTrait;
    use TradeStatusIdTrait;
    use TrailingStopLossOnFillTrait;
}
