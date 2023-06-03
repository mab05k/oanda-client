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
 * Trait HalfSpreadCostTrait.
 */
trait HalfSpreadCostTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("halfSpreadCost")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $halfSpreadCost;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getHalfSpreadCost(): ?Money
    {
        return $this->halfSpreadCost;
    }

    /**
     * @param \Brick\Money\Money|null $halfSpreadCost
     *
     * @return $this
     */
    public function setHalfSpreadCost(?Money $halfSpreadCost)
    {
        $this->halfSpreadCost = $halfSpreadCost;

        return $this;
    }
}
