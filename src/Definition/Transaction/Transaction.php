<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction;

use Brick\Money\Money;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\FullPriceTrait;
use Mab05k\OandaClient\Definition\Traits\HalfSpreadCostTrait;
use Mab05k\OandaClient\Definition\Traits\IdTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\PositionFillTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;
use Mab05k\OandaClient\Definition\Traits\ReasonTrait;
use Mab05k\OandaClient\Definition\Traits\RejectReasonTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;
use Mab05k\OandaClient\Definition\Traits\TimeTrait;
use Mab05k\OandaClient\Definition\Traits\TradeOpenedTrait;
use Mab05k\OandaClient\Definition\Traits\TradesClosedTrait;
use Mab05k\OandaClient\Definition\Traits\TransactionOrderIdTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;

/**
 * Class Transaction.
 */
class Transaction
{
    use FinancingTrait;
    use FullPriceTrait;
    use HalfSpreadCostTrait;
    use IdTrait;
    use InstrumentTrait;
    use PositionFillTrait;
    use PriceTrait;
    use ProfitLossTrait;
    use ReasonTrait;
    use RejectReasonTrait;
    use TimeInForceTrait;
    use TimeTrait;
    use TradeOpenedTrait;
    use TradesClosedTrait;
    use TransactionOrderIdTrait;
    use TypeTrait;
    use UnitTrait;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("accountBalance")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $accountBalance;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("accountFinancingMode")
     *
     * @Serializer\Type("string")
     */
    private $accountFinancingMode;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("divisionID")
     *
     * @Serializer\Type("integer")
     */
    private $divisionId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("siteID")
     *
     * @Serializer\Type("integer")
     */
    private $siteId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("accountUserID")
     *
     * @Serializer\Type("integer")
     */
    private $accountUserId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("accountNumber")
     *
     * @Serializer\Type("integer")
     */
    private $accountNumber;

    /**
     * string|null.
     *
     * @Serializer\SerializedName("homeCurrency")
     *
     * @Serializer\Type("string")
     */
    private $homeCurrency;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("userID")
     *
     * @Serializer\Type("integer")
     */
    private $userId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("accountID")
     *
     * @Serializer\Type("string")
     */
    private $accountId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("batchID")
     *
     * @Serializer\Type("integer")
     */
    private $batchId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("requestID")
     *
     * @Serializer\Type("string")
     */
    private $requestId;

    /**
     * @return Money|null
     */
    public function getAccountBalance(): ?Money
    {
        return $this->accountBalance;
    }

    /**
     * @param Money|null $accountBalance
     *
     * @return Transaction
     */
    public function setAccountBalance(?Money $accountBalance): self
    {
        $this->accountBalance = $accountBalance;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountFinancingMode(): ?string
    {
        return $this->accountFinancingMode;
    }

    /**
     * @param string|null $accountFinancingMode
     *
     * @return Transaction
     */
    public function setAccountFinancingMode(?string $accountFinancingMode): self
    {
        $this->accountFinancingMode = $accountFinancingMode;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDivisionId(): ?int
    {
        return $this->divisionId;
    }

    /**
     * @param int|null $divisionId
     *
     * @return Transaction
     */
    public function setDivisionId(?int $divisionId): self
    {
        $this->divisionId = $divisionId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSiteId(): ?int
    {
        return $this->siteId;
    }

    /**
     * @param int|null $siteId
     *
     * @return Transaction
     */
    public function setSiteId(?int $siteId): self
    {
        $this->siteId = $siteId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAccountUserId(): ?int
    {
        return $this->accountUserId;
    }

    /**
     * @param int|null $accountUserId
     *
     * @return Transaction
     */
    public function setAccountUserId(?int $accountUserId): self
    {
        $this->accountUserId = $accountUserId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAccountNumber(): ?int
    {
        return $this->accountNumber;
    }

    /**
     * @param int|null $accountNumber
     *
     * @return Transaction
     */
    public function setAccountNumber(?int $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHomeCurrency()
    {
        return $this->homeCurrency;
    }

    /**
     * @param mixed $homeCurrency
     *
     * @return Transaction
     */
    public function setHomeCurrency($homeCurrency)
    {
        $this->homeCurrency = $homeCurrency;

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
     * @return Transaction
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
     * @return Transaction
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
     * @return Transaction
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
     * @return Transaction
     */
    public function setRequestId(?string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }
}
