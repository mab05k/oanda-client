<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Constant;

/**
 * Class FundingReason.
 */
final class FundingReason
{
    public const CLIENT_FUNDING = 'CLIENT_FUNDING';
    public const ACCOUNT_TRANSFER = 'ACCOUNT_TRANSFER';
    public const DIVISION_MIGRATION = 'DIVISION_MIGRATION';
    public const SITE_MIGRATION = 'SITE_MIGRATION';
    public const ADJUSTMENT = 'ADJUSTMENT';
}
