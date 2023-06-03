<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use JMS\Serializer\Annotation as Serializer;

/**
 * Trait PositionFillTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait PositionFillTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("positionFill")
     *
     * @Serializer\Type("string")
     */
    private $positionFill;

    /**
     * @return string|null
     */
    public function getPositionFill(): ?string
    {
        return $this->positionFill;
    }

    /**
     * @param string|null $positionFill
     *
     * @return $this
     */
    public function setPositionFill(?string $positionFill)
    {
        $this->positionFill = $positionFill;

        return $this;
    }
}
