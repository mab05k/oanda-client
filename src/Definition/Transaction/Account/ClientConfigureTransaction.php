<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Account;

use Brick\Math\BigDecimal;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\AliasTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\TimeTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;

/**
 * Class ClientConfigureTransaction.
 */
class ClientConfigureTransaction
{
    use IdTrait;
    use TimeTrait;
    use TypeTrait;
    use AliasTrait;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("userID")
     * @Serializer\Type("integer")
     */
    private $userId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("accountID")
     * @Serializer\Type("string")
     */
    private $accountId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("batchID")
     * @Serializer\Type("integer")
     */
    private $batchId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("requestID")
     * @Serializer\Type("string")
     */
    private $requestId;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("marginRate")
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $marginRate;

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
     * @return ClientConfigureTransaction
     */
    public function setUserId(?int $userId): self
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
     * @return ClientConfigureTransaction
     */
    public function setAccountId(?string $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBatchId(): ?int
    {
        return $this->batchId;
    }

    /**
     * @param int|null $batchId
     *
     * @return ClientConfigureTransaction
     */
    public function setBatchId(?int $batchId): self
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
     * @return ClientConfigureTransaction
     */
    public function setRequestId(?string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getMarginRate(): ?BigDecimal
    {
        return $this->marginRate;
    }

    /**
     * @param BigDecimal|null $marginRate
     *
     * @return ClientConfigureTransaction
     */
    public function setMarginRate(?BigDecimal $marginRate): self
    {
        $this->marginRate = $marginRate;

        return $this;
    }
}
