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
use Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail;

/**
 * Trait StopLossOnFillTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait StopLossOnFillTrait
{
    /**
     * @var \Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail|null
     *
     * @Serializer\SerializedName("stopLossOnFill")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail")
     */
    private $stopLossOnFill;

    /**
     * @return \Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail|null
     */
    public function getStopLossOnFill(): ?StopLossDetail
    {
        return $this->stopLossOnFill;
    }

    /**
     * @param \Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail|null $stopLossOnFill
     *
     * @return $this
     */
    public function setStopLossOnFill(?StopLossDetail $stopLossOnFill)
    {
        $this->stopLossOnFill = $stopLossOnFill;

        return $this;
    }
}
