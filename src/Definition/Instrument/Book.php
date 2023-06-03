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
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;

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
     *
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s\Z'>")
     */
    private $time;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("bucketWidth")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $bucketWidth;

    /**
     * @var array|BookBucket[]|null
     *
     * @Serializer\SerializedName("buckets")
     *
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Instrument\BookBucket>")
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
     * @return Money|null
     */
    public function getBucketWidth(): ?Money
    {
        return $this->bucketWidth;
    }

    /**
     * @param Money|null $bucketWidth
     *
     * @return Book
     */
    public function setBucketWidth(?Money $bucketWidth): self
    {
        $this->bucketWidth = $bucketWidth;

        return $this;
    }

    /**
     * @return array|BookBucket[]|null
     */
    public function getBuckets()
    {
        return $this->buckets;
    }

    /**
     * @param array|BookBucket[]|null $buckets
     *
     * @return Book
     */
    public function setBuckets($buckets)
    {
        $this->buckets = $buckets;

        return $this;
    }
}
