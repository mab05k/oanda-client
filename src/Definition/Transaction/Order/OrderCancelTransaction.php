<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\ReasonTrait;
use Mab05k\OandaClient\Definition\Traits\TransactionOrderIdTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;

/**
 * Class OrderCancelTransaction.
 */
class OrderCancelTransaction implements OrderTransactionInterface
{
    use OrderTransactionTrait;
    use ReasonTrait;
    use TransactionOrderIdTrait;
    use TypeTrait;
}
