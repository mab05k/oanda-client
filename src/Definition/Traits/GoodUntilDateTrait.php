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
 * Trait GoodUntilDateTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait GoodUntilDateTrait
{
    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("gtdTime")
     */
    private $gtdTime;

    /**
     * @return \DateTime|null
     */
    public function getGtdTime(): ?\DateTime
    {
        return $this->gtdTime;
    }

    /**
     * @param \DateTime|null $gtdTime
     *
     * @return $this
     */
    public function setGtdTime(?\DateTime $gtdTime)
    {
        $this->gtdTime = $gtdTime;

        return $this;
    }
}
