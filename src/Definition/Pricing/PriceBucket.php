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
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class PriceBucket.
 */
class PriceBucket
{
    use PriceTrait;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("liquidity")
     */
    private $liquidity;

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getLiquidity(): ?BigDecimal
    {
        return $this->liquidity;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $liquidity
     *
     * @return PriceBucket
     */
    public function setLiquidity(?BigDecimal $liquidity): self
    {
        $this->liquidity = $liquidity;

        return $this;
    }
}
