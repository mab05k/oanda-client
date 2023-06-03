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
 * Class OrderPositionFill.
 */
final class OrderPositionFill
{
    public const OPEN_ONLY = 'OPEN_ONLY';
    public const REDUCE_FIRST = 'REDUCE_FIRST';
    public const REDUCE_ONLY = 'REDUCE_ONLY';
    public const DEFAULT = 'DEFAULT';
}
