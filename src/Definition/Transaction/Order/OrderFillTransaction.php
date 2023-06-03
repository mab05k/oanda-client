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
use JMS\Serializer\Annotation as Serializer;
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

/**
 * Class OrderFillTransaction.
 */
class OrderFillTransaction implements OrderTransactionInterface
{
    use CommissionTrait;
    use FinancingTrait;
    use FullPriceTrait;
    use HalfSpreadCostTrait;
    use InstrumentTrait;
    use OrderTransactionTrait;
    use PriceTrait;
    use ProfitLossTrait;
    use ReasonTrait;
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
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("gainQuoteHomeConversionFactor")
     *
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $gainQuoteHomeConversionFactor;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("lossQuoteHomeConversionFactor")
     *
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $lossQuoteHomeConversionFactor;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("guaranteedExecutionFee")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $guaranteedExecutionFee;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("requestedUnits")
     *
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $requestedUnits;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("fullVWAP")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $fullVWap;

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
     * @return OrderFillTransaction
     */
    public function setAccountBalance(?Money $accountBalance): self
    {
        $this->accountBalance = $accountBalance;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getGainQuoteHomeConversionFactor(): ?BigDecimal
    {
        return $this->gainQuoteHomeConversionFactor;
    }

    /**
     * @param BigDecimal|null $gainQuoteHomeConversionFactor
     *
     * @return OrderFillTransaction
     */
    public function setGainQuoteHomeConversionFactor(?BigDecimal $gainQuoteHomeConversionFactor): self
    {
        $this->gainQuoteHomeConversionFactor = $gainQuoteHomeConversionFactor;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getLossQuoteHomeConversionFactor(): ?BigDecimal
    {
        return $this->lossQuoteHomeConversionFactor;
    }

    /**
     * @param BigDecimal|null $lossQuoteHomeConversionFactor
     *
     * @return OrderFillTransaction
     */
    public function setLossQuoteHomeConversionFactor(?BigDecimal $lossQuoteHomeConversionFactor): self
    {
        $this->lossQuoteHomeConversionFactor = $lossQuoteHomeConversionFactor;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getGuaranteedExecutionFee(): ?Money
    {
        return $this->guaranteedExecutionFee;
    }

    /**
     * @param Money|null $guaranteedExecutionFee
     *
     * @return OrderFillTransaction
     */
    public function setGuaranteedExecutionFee(?Money $guaranteedExecutionFee): self
    {
        $this->guaranteedExecutionFee = $guaranteedExecutionFee;

        return $this;
    }

    /**
     * @return BigDecimal|null
     */
    public function getRequestedUnits(): ?BigDecimal
    {
        return $this->requestedUnits;
    }

    /**
     * @param BigDecimal|null $requestedUnits
     *
     * @return OrderFillTransaction
     */
    public function setRequestedUnits(?BigDecimal $requestedUnits): self
    {
        $this->requestedUnits = $requestedUnits;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getFullVWap(): ?Money
    {
        return $this->fullVWap;
    }

    /**
     * @param Money|null $fullVWap
     *
     * @return OrderFillTransaction
     */
    public function setFullVWap(?Money $fullVWap): self
    {
        $this->fullVWap = $fullVWap;

        return $this;
    }
}
