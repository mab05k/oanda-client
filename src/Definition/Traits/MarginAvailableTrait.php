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
use JMS\Serializer\Annotation as Serializer;

/**
 * Trait MarginAvailableTrait.
 */
trait MarginAvailableTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("marginAvailable")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginAvailable;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getMarginAvailable(): ?Money
    {
        return $this->marginAvailable;
    }

    /**
     * @param \Brick\Money\Money|null $marginAvailable
     *
     * @return $this
     */
    public function setMarginAvailable(?Money $marginAvailable)
    {
        $this->marginAvailable = $marginAvailable;

        return $this;
    }
}
