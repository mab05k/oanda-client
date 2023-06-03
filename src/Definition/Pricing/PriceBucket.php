<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing;

use Brick\Math\BigDecimal;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;

/**
 * Class PriceBucket.
 */
class PriceBucket
{
    use PriceTrait;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("liquidity")
     *
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $liquidity;

    /**
     * @return BigDecimal|null
     */
    public function getLiquidity(): ?BigDecimal
    {
        return $this->liquidity;
    }

    /**
     * @param BigDecimal|null $liquidity
     *
     * @return PriceBucket
     */
    public function setLiquidity(?BigDecimal $liquidity): self
    {
        $this->liquidity = $liquidity;

        return $this;
    }
}
