<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Order;

use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\ClientTradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\GoodUntilDateTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeIdTrait;
use Mab05k\OandaClient\Definition\Traits\TriggerConditionTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;

/**
 * Class AbstractTradeOrderRequest.
 */
class AbstractTradeOrderRequest
{
    use ClientExtensionsTrait;
    use ClientTradeIdTrait;
    use GoodUntilDateTrait;
    use PriceTrait;
    use TimeInForceTrait;
    use TradeIdTrait;
    use TriggerConditionTrait;
    use TypeTrait;
}
