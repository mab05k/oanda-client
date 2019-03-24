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

/**
 * Trait MarginAvailableTrait.
 */
trait MarginAvailableTrait
{
    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginAvailable")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginAvailable;

    /**
     * @return Money|null
     */
    public function getMarginAvailable(): ?Money
    {
        return $this->marginAvailable;
    }

    /**
     * @param Money|null $marginAvailable
     *
     * @return $this
     */
    public function setMarginAvailable(?Money $marginAvailable)
    {
        $this->marginAvailable = $marginAvailable;

        return $this;
    }
}
