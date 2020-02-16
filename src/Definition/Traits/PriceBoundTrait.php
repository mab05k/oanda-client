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
 * Trait PriceBoundTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait PriceBoundTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("priceBound")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $priceBound;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getPriceBound(): ?Money
    {
        return $this->priceBound;
    }

    /**
     * @param \Brick\Money\Money|null $priceBound
     *
     * @return $this
     */
    public function setPriceBound(?Money $priceBound)
    {
        $this->priceBound = $priceBound;

        return $this;
    }
}
