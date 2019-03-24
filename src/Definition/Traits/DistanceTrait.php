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
use JMS\Serializer\Annotation as Serializer;

/**
 * Trait DistanceTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait DistanceTrait
{
    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("distance")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $distance;

    /**
     * @return BigDecimal|null
     */
    public function getDistance(): ?BigDecimal
    {
        return $this->distance;
    }

    /**
     * @param BigDecimal|null $distance
     *
     * @return $this
     */
    public function setDistance(?BigDecimal $distance)
    {
        $this->distance = $distance;

        return $this;
    }
}
