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
use Mab05k\OandaClient\Definition\Traits\BalanceTrait;
use Mab05k\OandaClient\Definition\Traits\CommissionTrait;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\GuaranteedExecutionFeesTrait;
use Mab05k\OandaClient\Definition\Traits\MarginAvailableTrait;
use Mab05k\OandaClient\Definition\Traits\MarginCloseoutTrait;
use Mab05k\OandaClient\Definition\Traits\MarginUsedTrait;
use Mab05k\OandaClient\Definition\Traits\NavTrait;
use Mab05k\OandaClient\Definition\Traits\PositionValueTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;
use Mab05k\OandaClient\Definition\Traits\WithdrawalLimitTrait;

/**
 * Class AccountState.
 */
class AccountState
{
    use AccountOpenSummaryTrait;
    use BalanceTrait;
    use CommissionTrait;
    use FinancingTrait;
    use GuaranteedExecutionFeesTrait;
    use MarginAvailableTrait;
    use MarginCloseoutTrait;
    use MarginUsedTrait;
    use NavTrait;
    use PositionValueTrait;
    use ProfitLossTrait;
    use WithdrawalLimitTrait;
}
