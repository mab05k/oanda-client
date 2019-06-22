<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait GuaranteedStopLossOrderModeTrait.
 */
trait GuaranteedStopLossOrderModeTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("guaranteedStopLossOrderMode")
     */
    private $guaranteedStopLossOrderMode;

    /**
     * @return string|null
     */
    public function getGuaranteedStopLossOrderMode(): ?string
    {
        return $this->guaranteedStopLossOrderMode;
    }

    /**
     * @param string|null $guaranteedStopLossOrderMode
     *
     * @return $this
     */
    public function setGuaranteedStopLossOrderMode(?string $guaranteedStopLossOrderMode)
    {
        $this->guaranteedStopLossOrderMode = $guaranteedStopLossOrderMode;

        return $this;
    }
}
