<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

use Mab05k\OandaClient\Definition\Traits\AccountOpenSummaryTrait;

/**
 * Class Account.
 */
class Account extends AccountSummary
{
    use AccountOpenSummaryTrait;
}
