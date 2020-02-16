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
 * Class PriceTrait.
 */
trait PriceTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("price")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $price;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getPrice(): ?Money
    {
        return $this->price;
    }

    /**
     * @param \Brick\Money\Money|null $price
     *
     * @return $this
     */
    public function setPrice(?Money $price)
    {
        $this->price = $price;

        return $this;
    }
}
