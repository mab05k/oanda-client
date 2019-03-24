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
 * Class TimeInForce.
 */
final class TimeInForce
{
    // The Order is “Good unTil Cancelled”
    const GTC = 'GTC';

    // The Order is “Good unTil Date” and will be cancelled at the provided time
    const GTD = 'GTD';

    // The Order is “Good For Day” and will be cancelled at 5pm New York time
    const GFD = 'GFD';

    // The Order must be immediately “Filled Or Killed”
    const FOK = 'FOK';

    // The Order must be “Immediatedly paritally filled Or Cancelled”
    const IOC = 'IOC';
}
