<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\MarketOrder;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class MarketOrderMarginCloseout.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class MarketOrderMarginCloseout
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("reason")
     */
    private $reason;

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param string|null $reason
     *
     * @return MarketOrderMarginCloseout
     */
    public function setReason(?string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }
}
