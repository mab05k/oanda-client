<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Brick\Math\BigDecimal;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class UnitTrait.
 */
trait UnitTrait
{
    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("units")
     */
    private $units;

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getUnits(): ?BigDecimal
    {
        return $this->units;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $units
     *
     * @return $this
     */
    public function setUnits(?BigDecimal $units)
    {
        $this->units = $units;

        return $this;
    }
}
