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
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait GuaranteedExecutionFeesTrait.
 */
trait GuaranteedExecutionFeesTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("guaranteedExecutionFees")
     */
    private $guaranteedExecutionFees;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getGuaranteedExecutionFees(): ?Money
    {
        return $this->guaranteedExecutionFees;
    }

    /**
     * @param \Brick\Money\Money|null $guaranteedExecutionFees
     *
     * @return $this
     */
    public function setGuaranteedExecutionFees(?Money $guaranteedExecutionFees)
    {
        $this->guaranteedExecutionFees = $guaranteedExecutionFees;

        return $this;
    }
}
