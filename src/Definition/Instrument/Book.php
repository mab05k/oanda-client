<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Instrument;

use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class BookInstrument.
 */
class Book
{
    use InstrumentTrait;
    use PriceTrait;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("time")
     */
    private $time;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("bucketWidth")
     */
    private $bucketWidth;

    /**
     * @var BookBucket[]|null
     *
     * @Serializer\SerializedName("buckets")
     */
    private $buckets;

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

    /**
     * @return \Brick\Money\Money|null
     */
    public function getBucketWidth(): ?Money
    {
        return $this->bucketWidth;
    }

    /**
     * @param \Brick\Money\Money|null $bucketWidth
     *
     * @return Book
     */
    public function setBucketWidth(?Money $bucketWidth): self
    {
        $this->bucketWidth = $bucketWidth;

        return $this;
    }

    /**
     * @return BookBucket[]|null
     */
    public function getBuckets()
    {
        return $this->buckets;
    }

    /**
     * @param BookBucket[]|null $buckets
     *
     * @return Book
     */
    public function setBuckets($buckets)
    {
        $this->buckets = $buckets;

        return $this;
    }
}
