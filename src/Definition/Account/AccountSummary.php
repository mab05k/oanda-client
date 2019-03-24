<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

use Brick\Money\Money;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\AccountCreatedTrait;
use Mab05k\OandaClient\Definition\Traits\AccountMarginTrait;
use Mab05k\OandaClient\Definition\Traits\AccountOpenStatusTrait;
use Mab05k\OandaClient\Definition\Traits\AliasTrait;
use Mab05k\OandaClient\Definition\Traits\BalanceTrait;
use Mab05k\OandaClient\Definition\Traits\CommissionTrait;
use Mab05k\OandaClient\Definition\Traits\CurrencyTrait;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\GuaranteedExecutionFeesTrait;
use Mab05k\OandaClient\Definition\Traits\GuaranteedStopLossOrderModeTrait;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Mab05k\OandaClient\Definition\Traits\MarginAvailableTrait;
use Mab05k\OandaClient\Definition\Traits\MarginCloseoutTrait;
use Mab05k\OandaClient\Definition\Traits\MarginUsedTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;

/**
 * Class AccountDetail.
 */
class AccountSummary
{
    use AliasTrait;
    use CurrencyTrait;
    use BalanceTrait;
    use AccountCreatedTrait;
    use GuaranteedStopLossOrderModeTrait;
    use ProfitLossTrait;
    use FinancingTrait;
    use CommissionTrait;
    use GuaranteedExecutionFeesTrait;
    use AccountMarginTrait;
    use AccountOpenStatusTrait;
    use LastTransactionIdTrait;
    use MarginUsedTrait;
    use MarginAvailableTrait;
    use MarginCloseoutTrait;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("id")
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("hedgingEnabled")
     * @Serializer\Type("boolean")
     */
    private $hedgingEnabled;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("NAV")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $nav;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("resettablePLTime")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $resettablePlTime;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("positionValue")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $positionValue;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("withdrawalLimit")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $withdrawalLimit;

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
     * @return AccountSummary
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHedgingEnabled(): ?bool
    {
        return $this->hedgingEnabled;
    }

    /**
     * @param bool|null $hedgingEnabled
     *
     * @return AccountSummary
     */
    public function setHedgingEnabled(?bool $hedgingEnabled): self
    {
        $this->hedgingEnabled = $hedgingEnabled;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getNav(): ?Money
    {
        return $this->nav;
    }

    /**
     * @param Money|null $nav
     *
     * @return AccountSummary
     */
    public function setNav(?Money $nav): self
    {
        $this->nav = $nav;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getResettablePlTime(): ?\DateTime
    {
        return $this->resettablePlTime;
    }

    /**
     * @param \DateTime|null $resettablePlTime
     *
     * @return AccountSummary
     */
    public function setResettablePlTime(?\DateTime $resettablePlTime): self
    {
        $this->resettablePlTime = $resettablePlTime;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getPositionValue(): ?Money
    {
        return $this->positionValue;
    }

    /**
     * @param Money|null $positionValue
     *
     * @return AccountSummary
     */
    public function setPositionValue(?Money $positionValue): self
    {
        $this->positionValue = $positionValue;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getWithdrawalLimit(): ?Money
    {
        return $this->withdrawalLimit;
    }

    /**
     * @param Money|null $withdrawalLimit
     *
     * @return AccountSummary
     */
    public function setWithdrawalLimit(?Money $withdrawalLimit): self
    {
        $this->withdrawalLimit = $withdrawalLimit;

        return $this;
    }
}
