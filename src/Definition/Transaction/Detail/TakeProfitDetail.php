<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Detail;

use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\GoodUntilDateTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;

/**
 * Class TakeProfitDetail.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class TakeProfitDetail
{
    use ClientExtensionsTrait;
    use GoodUntilDateTrait;
    use PriceTrait;
    use TimeInForceTrait;
}
