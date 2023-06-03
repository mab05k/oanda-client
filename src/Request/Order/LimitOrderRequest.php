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
use Mab05k\OandaClient\Definition\Traits\GoodUntilDateTrait;
use Mab05k\OandaClient\Definition\Traits\PositionFillTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TriggerConditionTrait;

/**
 * Class LimitOrderRequest.
 */
class LimitOrderRequest extends AbstractOrderRequest
{
    use ClientExtensionsTrait;
    use GoodUntilDateTrait;
    use PositionFillTrait;
    use PriceTrait;
    use TriggerConditionTrait;
}
