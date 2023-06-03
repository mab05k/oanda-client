<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

/**
 * Trait TimeTrait.
 */
trait TimeTrait
{
    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("time")
     *
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $time;

    /**
     * @return \DateTime|null
     */
    public function getTime(): ?\DateTime
    {
        return $this->time;
    }

    /**
     * @param \DateTime|null $time
     *
     * @return $this
     */
    public function setTime(?\DateTime $time)
    {
        $this->time = $time;

        return $this;
    }
}
