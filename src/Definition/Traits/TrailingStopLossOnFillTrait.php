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
use Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail;

/**
 * Trait TrailingStopLossOnFillTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TrailingStopLossOnFillTrait
{
    /**
     * @var \Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail|null
     *
     * @Serializer\SerializedName("trailingStopLossOnFill")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail")
     */
    private $trailingStopLossOnFill;

    /**
     * @return \Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail|null
     */
    public function getTrailingStopLossOnFill(): ?TrailingStopLossDetail
    {
        return $this->trailingStopLossOnFill;
    }

    /**
     * @param \Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail|null $trailingStopLossOnFill
     *
     * @return $this
     */
    public function setTrailingStopLossOnFill(?TrailingStopLossDetail $trailingStopLossOnFill)
    {
        $this->trailingStopLossOnFill = $trailingStopLossOnFill;

        return $this;
    }
}
