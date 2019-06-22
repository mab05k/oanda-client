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
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Transaction.
 */
class Transaction
{
    use IdTrait;
    use TypeTrait;
    use UnitTrait;
    use InstrumentTrait;
    use TransactionOrderIdTrait;
    use PriceTrait;
    use ProfitLossTrait;
    use TradeOpenedTrait;
    use FullPriceTrait;
    use HalfSpreadCostTrait;
    use TradesClosedTrait;
    use TimeTrait;
    use RejectReasonTrait;
    use ReasonTrait;
    use TimeInForceTrait;
    use FinancingTrait;
    use PositionFillTrait;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("accountBalance")
     */
    private $accountBalance;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("accountFinancingMode")
     */
    private $accountFinancingMode;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("divisionID")
     */
    private $divisionId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("siteID")
     */
    private $siteId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("accountUserID")
     */
    private $accountUserId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("accountNumber")
     */
    private $accountNumber;

    /**
     * string|null.
     *
     * @Serializer\SerializedName("homeCurrency")
     */
    private $homeCurrency;

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
     * @return \Brick\Money\Money|null
     */
    public function getAccountBalance(): ?Money
    {
        return $this->accountBalance;
    }

    /**
     * @param \Brick\Money\Money|null $accountBalance
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
     * @return string|null
     */
    public function getBatchId(): ?string
    {
        return $this->batchId;
    }

    /**
     * @param string|null $batchId
     *
     * @return Transaction
     */
    public function setBatchId(?string $batchId): self
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
