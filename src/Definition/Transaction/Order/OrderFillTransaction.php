<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use Brick\Math\BigDecimal;
use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\CommissionTrait;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\FullPriceTrait;
use Mab05k\OandaClient\Definition\Traits\HalfSpreadCostTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;
use Mab05k\OandaClient\Definition\Traits\ReasonTrait;
use Mab05k\OandaClient\Definition\Traits\TradeOpenedTrait;
use Mab05k\OandaClient\Definition\Traits\TradesClosedTrait;
use Mab05k\OandaClient\Definition\Traits\TransactionOrderIdTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Traits\UnitTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class OrderFillTransaction.
 */
class OrderFillTransaction implements OrderTransactionInterface
{
    use TypeTrait;
    use InstrumentTrait;
    use UnitTrait;
    use PriceTrait;
    use OrderTransactionTrait;
    use ReasonTrait;
    use TransactionOrderIdTrait;
    use FullPriceTrait;
    use TradeOpenedTrait;
    use HalfSpreadCostTrait;
    use FinancingTrait;
    use CommissionTrait;
    use TradesClosedTrait;
    use ProfitLossTrait;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("accountBalance")
     */
    private $accountBalance;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("gainQuoteHomeConversionFactor")
     */
    private $gainQuoteHomeConversionFactor;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("lossQuoteHomeConversionFactor")
     */
    private $lossQuoteHomeConversionFactor;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("guaranteedExecutionFee")
     */
    private $guaranteedExecutionFee;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("requestedUnits")
     */
    private $requestedUnits;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("fullVWAP")
     */
    private $fullVWap;

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
     * @return OrderFillTransaction
     */
    public function setAccountBalance(?Money $accountBalance): self
    {
        $this->accountBalance = $accountBalance;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getGainQuoteHomeConversionFactor(): ?BigDecimal
    {
        return $this->gainQuoteHomeConversionFactor;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $gainQuoteHomeConversionFactor
     *
     * @return OrderFillTransaction
     */
    public function setGainQuoteHomeConversionFactor(?BigDecimal $gainQuoteHomeConversionFactor): self
    {
        $this->gainQuoteHomeConversionFactor = $gainQuoteHomeConversionFactor;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getLossQuoteHomeConversionFactor(): ?BigDecimal
    {
        return $this->lossQuoteHomeConversionFactor;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $lossQuoteHomeConversionFactor
     *
     * @return OrderFillTransaction
     */
    public function setLossQuoteHomeConversionFactor(?BigDecimal $lossQuoteHomeConversionFactor): self
    {
        $this->lossQuoteHomeConversionFactor = $lossQuoteHomeConversionFactor;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getGuaranteedExecutionFee(): ?Money
    {
        return $this->guaranteedExecutionFee;
    }

    /**
     * @param \Brick\Money\Money|null $guaranteedExecutionFee
     *
     * @return OrderFillTransaction
     */
    public function setGuaranteedExecutionFee(?Money $guaranteedExecutionFee): self
    {
        $this->guaranteedExecutionFee = $guaranteedExecutionFee;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getRequestedUnits(): ?BigDecimal
    {
        return $this->requestedUnits;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $requestedUnits
     *
     * @return OrderFillTransaction
     */
    public function setRequestedUnits(?BigDecimal $requestedUnits): self
    {
        $this->requestedUnits = $requestedUnits;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getFullVWap(): ?Money
    {
        return $this->fullVWap;
    }

    /**
     * @param \Brick\Money\Money|null $fullVWap
     *
     * @return OrderFillTransaction
     */
    public function setFullVWap(?Money $fullVWap): self
    {
        $this->fullVWap = $fullVWap;

        return $this;
    }
}
