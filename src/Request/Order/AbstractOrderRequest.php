<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Order;

use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\StopLossOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TakeProfitOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;
use Mab05k\OandaClient\Definition\Traits\TradeClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\TrailingStopLossOnFillTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;

/**
 * Class AbstractOrderRequest.
 */
abstract class AbstractOrderRequest
{
    use InstrumentTrait;
    use StopLossOnFillTrait;
    use TakeProfitOnFillTrait;
    use TimeInForceTrait;
    use TradeClientExtensionsTrait;
    use TrailingStopLossOnFillTrait;
    use TypeTrait;
    use UnitTrait;
}
