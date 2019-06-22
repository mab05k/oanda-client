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
 * Trait AccountCreatedTrait.
 */
trait AccountCreatedTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("createdByUserID")
     */
    private $createdByUserId;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("createdTime")
     */
    private $createdTime;

    /**
     * @return int|null
     */
    public function getCreatedByUserId(): ?int
    {
        return $this->createdByUserId;
    }

    /**
     * @param int|null $createdByUserId
     *
     * @return $this
     */
    public function setCreatedByUserId(?int $createdByUserId)
    {
        $this->createdByUserId = $createdByUserId;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedTime(): ?\DateTime
    {
        return $this->createdTime;
    }

    /**
     * @param \DateTime|null $createdTime
     *
     * @return $this
     */
    public function setCreatedTime(?\DateTime $createdTime)
    {
        $this->createdTime = $createdTime;

        return $this;
    }
}
