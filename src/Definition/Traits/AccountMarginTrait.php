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

/**
 * Trait AccountMarginTrait.
 */
trait AccountMarginTrait
{
    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("marginRate")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $marginRate;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("marginCallEnterTime")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $marginCallEnterTime;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("marginCallExtensionCount")
     * @Serializer\Type("integer")
     */
    private $marginCallExtensionCount;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("lastMarginCallExtensionTime")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $lastMarginCallExtensionTime;

    /**
     * @return Money|null
     */
    public function getMarginRate(): ?Money
    {
        return $this->marginRate;
    }

    /**
     * @param Money|null $marginRate
     *
     * @return $this
     */
    public function setMarginRate(?Money $marginRate)
    {
        $this->marginRate = $marginRate;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getMarginCallEnterTime(): ?\DateTime
    {
        return $this->marginCallEnterTime;
    }

    /**
     * @param \DateTime|null $marginCallEnterTime
     *
     * @return $this
     */
    public function setMarginCallEnterTime(?\DateTime $marginCallEnterTime)
    {
        $this->marginCallEnterTime = $marginCallEnterTime;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMarginCallExtensionCount(): ?int
    {
        return $this->marginCallExtensionCount;
    }

    /**
     * @param int|null $marginCallExtensionCount
     *
     * @return $this
     */
    public function setMarginCallExtensionCount(?int $marginCallExtensionCount)
    {
        $this->marginCallExtensionCount = $marginCallExtensionCount;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastMarginCallExtensionTime(): ?\DateTime
    {
        return $this->lastMarginCallExtensionTime;
    }

    /**
     * @param \DateTime|null $lastMarginCallExtensionTime
     *
     * @return $this
     */
    public function setLastMarginCallExtensionTime(?\DateTime $lastMarginCallExtensionTime)
    {
        $this->lastMarginCallExtensionTime = $lastMarginCallExtensionTime;

        return $this;
    }
}
