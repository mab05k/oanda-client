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
 * Trait OrderTransactionTrait.
 */
trait OrderTransactionTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("id")
     */
    private $id;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("userID")
     */
    private $userId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("accountID")
     */
    private $accountId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("batchID")
     */
    private $batchId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("requestID")
     */
    private $requestId;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("time")
     */
    private $time;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return $this
     */
    public function setId(?string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     *
     * @return $this
     */
    public function setUserId(?int $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * @param string|null $accountId
     *
     * @return $this
     */
    public function setAccountId(?string $accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBatchId(): ?string
    {
        return $this->batchId;
    }

    /**
     * @param string|null $batchId
     *
     * @return $this
     */
    public function setBatchId(?string $batchId)
    {
        $this->batchId = $batchId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @param string|null $requestId
     *
     * @return $this
     */
    public function setRequestId(?string $requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

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
