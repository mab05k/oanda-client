<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Brick\Money\Money;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait MarginUsedTrait.
 */
trait MarginUsedTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginUsed")
     */
    private $marginUsed;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginUsed(): ?Money
    {
        return $this->marginUsed;
    }

    /**
     * @param \Brick\Money\Money|null $marginUsed
     *
     * @return $this
     */
    public function setMarginUsed(?Money $marginUsed)
    {
        $this->marginUsed = $marginUsed;

        return $this;
    }
}
