<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing\Price;

use Brick\Math\BigDecimal;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class UnitAvailable.
 */
class UnitAvailable
{
    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("long")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $long;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("long")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $short;

    /**
     * @return BigDecimal|null
     */
    public function getLong(): ?BigDecimal
    {
        return $this->long;
    }

    /**
     * @param BigDecimal|null $long
     *
     * @return UnitAvailable
     */
    public function setLong(?BigDecimal $long): self
    {
        $this->long = $long;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getShort(): ?BigDecimal
    {
        return $this->short;
    }

    /**
     * @param BigDecimal|null $short
     *
     * @return UnitAvailable
     */
    public function setShort(?BigDecimal $short): self
    {
        $this->short = $short;

        return $this;
    }
}
