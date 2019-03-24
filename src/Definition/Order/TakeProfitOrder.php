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
use Mab05k\OandaClient\Definition\Traits\TradeStatusIdTrait;
use Mab05k\OandaClient\Request\Order\TakeProfitOrderRequest;

/**
 * Class TakeProfitOrder.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class TakeProfitOrder extends TakeProfitOrderRequest
{
    use IdTrait;
    use CreateTimeTrait;
    use StateTrait;
    use FilledOrderTrait;
    use TradeStatusIdTrait;
    use CancelledOrderTrait;
    use ReplacedOrderTrait;
}
