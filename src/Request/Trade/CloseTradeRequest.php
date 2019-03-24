<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Trade;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class CloseTradeRequest.
 */
class CloseTradeRequest
{
    public const ALL = 'ALL';

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("units")
     * @Serializer\Type("string")
     */
    private $units;

    /**
     * @return string|null
     *
     * Indication of how much of the Trade to close. Either “ALL”, or a
     * DecimalNumber reflection a partial close of the Trade.
     */
    public function getUnits(): ?string
    {
        return $this->units;
    }

    /**
     * @param string|null $units
     *
     * @return CloseTradeRequest
     */
    public function setUnits(?string $units): self
    {
        $this->units = $units;

        return $this;
    }
}
