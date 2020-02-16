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
 * Trait PositionValueTrait.
 */
trait PositionValueTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("positionValue")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $positionValue;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getPositionValue(): ?Money
    {
        return $this->positionValue;
    }

    /**
     * @param \Brick\Money\Money|null $positionValue
     *
     * @return $this
     */
    public function setPositionValue(?Money $positionValue)
    {
        $this->positionValue = $positionValue;

        return $this;
    }
}
