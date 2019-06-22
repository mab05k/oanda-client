<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait StopLossOnFillTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait StopLossOnFillTrait
{
    /**
     * @var StopLossDetail|null
     *
     * @Serializer\SerializedName("stopLossOnFill")
     */
    private $stopLossOnFill;

    /**
     * @return StopLossDetail|null
     */
    public function getStopLossOnFill(): ?StopLossDetail
    {
        return $this->stopLossOnFill;
    }

    /**
     * @param StopLossDetail|null $stopLossOnFill
     *
     * @return $this
     */
    public function setStopLossOnFill(?StopLossDetail $stopLossOnFill)
    {
        $this->stopLossOnFill = $stopLossOnFill;

        return $this;
    }
}
