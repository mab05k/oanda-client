<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request;

use Brick\Math\BigDecimal;
use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Constant\OrderPositionFill;
use Mab05k\OandaClient\Definition\Constant\OrderTriggerCondition;
use Mab05k\OandaClient\Definition\Constant\OrderType;
use Mab05k\OandaClient\Definition\Constant\TimeInForce;
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail;
use Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail;
use Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail;
use Mab05k\OandaClient\Request\Order\Envelope\LimitOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\Envelope\MarketIfTouchedOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\Envelope\MarketOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\Envelope\StopLossOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\Envelope\StopOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\Envelope\TakeProfitOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\Envelope\TrailingStopLossOrderRequestEnvelope;
use Mab05k\OandaClient\Request\Order\LimitOrderRequest;
use Mab05k\OandaClient\Request\Order\MarketIfTouchedOrderRequest;
use Mab05k\OandaClient\Request\Order\MarketOrderRequest;
use Mab05k\OandaClient\Request\Order\OrderClientExtensionsRequest;
use Mab05k\OandaClient\Request\Order\StopLossOrderRequest;
use Mab05k\OandaClient\Request\Order\StopOrderRequest;
use Mab05k\OandaClient\Request\Order\TakeProfitOrderRequest;
use Mab05k\OandaClient\Request\Order\TrailingStopLossOrderRequest;

/**
 * Class OrderFactory.
 */
class OrderRequestFactory
{
    /**
     * @param string                      $instrument
     * @param \Brick\Math\BigDecimal      $units
     * @param ClientExtension             $clientExtension
     * @param \Brick\Money\Money|null     $priceBound
     * @param string                      $timeInForce
     * @param string                      $positionFill
     * @param TakeProfitDetail|null       $takeProfitOnFill
     * @param StopLossDetail|null         $stopLossOnFill
     * @param TrailingStopLossDetail|null $trailingStopLossOnFill
     * @param ClientExtension|null        $tradeClientExtensions
     *
     * @return MarketOrderRequestEnvelope
     */
    public static function marketOrderRequest(
        string $instrument,
        BigDecimal $units,
        string $timeInForce = TimeInForce::FOK,
        string $positionFill = OrderPositionFill::DEFAULT,
        ?ClientExtension $clientExtension = null,
        ?Money $priceBound = null,
        ?TakeProfitDetail $takeProfitOnFill = null,
        ?StopLossDetail $stopLossOnFill = null,
        ?TrailingStopLossDetail $trailingStopLossOnFill = null,
        ?ClientExtension $tradeClientExtensions = null
    ): MarketOrderRequestEnvelope {
        $marketOrderRequestEnvelope = new MarketOrderRequestEnvelope();
        $marketOrderRequest = (new MarketOrderRequest())
            ->setType(OrderType::MARKET)
            ->setInstrument($instrument)
            ->setUnits($units)
            ->setClientExtensions($clientExtension)
            ->setUnits($units)
            ->setPriceBound($priceBound)
            ->setTimeInForce($timeInForce)
            ->setPositionFill($positionFill)
            ->setTakeProfitOnFill($takeProfitOnFill)
            ->setStopLossOnFill($stopLossOnFill)
            ->setTrailingStopLossOnFill($trailingStopLossOnFill)
            ->setTradeClientExtensions($tradeClientExtensions);

        return $marketOrderRequestEnvelope->setOrder($marketOrderRequest);
    }

    /**
     * @param string                      $instrument
     * @param \Brick\Math\BigDecimal      $units
     * @param \Brick\Money\Money          $price
     * @param ClientExtension|null        $clientExtension
     * @param string                      $timeInForce
     * @param \DateTime|null              $gtdTime
     * @param string                      $positionFill
     * @param string                      $triggerCondition
     * @param TakeProfitDetail|null       $takeProfitOnFill
     * @param StopLossDetail|null         $stopLossOnFill
     * @param TrailingStopLossDetail|null $trailingStopLossOnFill
     * @param ClientExtension|null        $tradeClientExtensions
     *
     * @return LimitOrderRequestEnvelope
     */
    public static function limitOrderRequest(
        string $instrument,
        BigDecimal $units,
        Money $price,
        string $timeInForce = TimeInForce::GTC,
        string $positionFill = OrderPositionFill::DEFAULT,
        string $triggerCondition = OrderTriggerCondition::DEFAULT,
        ?ClientExtension $clientExtension = null,
        ?\DateTime $gtdTime = null,
        ?TakeProfitDetail $takeProfitOnFill = null,
        ?StopLossDetail $stopLossOnFill = null,
        ?TrailingStopLossDetail $trailingStopLossOnFill = null,
        ?ClientExtension $tradeClientExtensions = null
    ): LimitOrderRequestEnvelope {
        $limitOrderRequestEnvelope = new LimitOrderRequestEnvelope();
        $limitOrderRequest = (new LimitOrderRequest())
            ->setType(OrderType::LIMIT)
            ->setInstrument($instrument)
            ->setUnits($units)
            ->setPrice($price)
            ->setClientExtensions($clientExtension)
            ->setTimeInForce($timeInForce)
            ->setGtdTime($gtdTime)
            ->setPositionFill($positionFill)
            ->setTriggerCondition($triggerCondition)
            ->setTakeProfitOnFill($takeProfitOnFill)
            ->setStopLossOnFill($stopLossOnFill)
            ->setTrailingStopLossOnFill($trailingStopLossOnFill)
            ->setTradeClientExtensions($tradeClientExtensions);

        return $limitOrderRequestEnvelope->setOrder($limitOrderRequest);
    }

    /**
     * @param string                      $instrument
     * @param \Brick\Math\BigDecimal      $units
     * @param \Brick\Money\Money          $price
     * @param ClientExtension|null        $clientExtension
     * @param \Brick\Money\Money|null     $priceBound
     * @param string                      $timeInForce
     * @param \DateTime|null              $gtdTime
     * @param string                      $positionFill
     * @param string                      $triggerCondition
     * @param TakeProfitDetail|null       $takeProfitOnFill
     * @param StopLossDetail|null         $stopLossOnFill
     * @param TrailingStopLossDetail|null $trailingStopLossOnFill
     * @param ClientExtension|null        $tradeClientExtensions
     *
     * @return MarketIfTouchedOrderRequestEnvelope
     */
    public static function marketIfTouchedOrderRequest(
        string $instrument,
        BigDecimal $units,
        Money $price,
        string $timeInForce = TimeInForce::GTC,
        string $positionFill = OrderPositionFill::DEFAULT,
        string $triggerCondition = OrderTriggerCondition::DEFAULT,
        ?Money $priceBound = null,
        ?ClientExtension $clientExtension = null,
        ?\DateTime $gtdTime = null,
        ?TakeProfitDetail $takeProfitOnFill = null,
        ?StopLossDetail $stopLossOnFill = null,
        ?TrailingStopLossDetail $trailingStopLossOnFill = null,
        ?ClientExtension $tradeClientExtensions = null
    ): MarketIfTouchedOrderRequestEnvelope {
        $marketIfTouchedOrderRequestEnvelope = new MarketIfTouchedOrderRequestEnvelope();
        $marketIfTouchedOrderRequest = (new MarketIfTouchedOrderRequest())
            ->setType(OrderType::MARKET_IF_TOUCHED)
            ->setInstrument($instrument)
            ->setUnits($units)
            ->setPrice($price)
            ->setPriceBound($priceBound)
            ->setClientExtensions($clientExtension)
            ->setTimeInForce($timeInForce)
            ->setGtdTime($gtdTime)
            ->setPositionFill($positionFill)
            ->setTriggerCondition($triggerCondition)
            ->setTakeProfitOnFill($takeProfitOnFill)
            ->setStopLossOnFill($stopLossOnFill)
            ->setTrailingStopLossOnFill($trailingStopLossOnFill)
            ->setTradeClientExtensions($tradeClientExtensions);

        return $marketIfTouchedOrderRequestEnvelope->setOrder($marketIfTouchedOrderRequest);
    }

    /**
     * @param int                    $tradeId
     * @param string                 $clientTradeId
     * @param \Brick\Money\Money     $price
     * @param \Brick\Math\BigDecimal $distance
     * @param ClientExtension        $clientExtension
     * @param string                 $timeInForce
     * @param \DateTime|null         $gtdTime
     * @param string                 $triggerCondition
     * @param bool                   $guaranteed
     *
     * @return StopLossOrderRequestEnvelope
     */
    public static function stopLossOrderRequest(
        string $tradeId,
        Money $price,
        ?BigDecimal $distance = null,
        ?string $clientTradeId = null,
        ?ClientExtension $clientExtension = null,
        ?\DateTime $gtdTime = null,
        string $timeInForce = TimeInForce::GTC,
        string $triggerCondition = OrderTriggerCondition::DEFAULT,
        bool $guaranteed = false
    ): StopLossOrderRequestEnvelope {
        $stopLossOrderRequestEnvelope = new StopLossOrderRequestEnvelope();
        $stopLossOrderRequest = (new StopLossOrderRequest())
            ->setType(OrderType::STOP_LOSS)
            ->setTradeId($tradeId)
            ->setClientTradeId($clientTradeId)
            ->setPrice($price)
            ->setDistance($distance)
            ->setClientExtensions($clientExtension)
            ->setTimeInForce($timeInForce)
            ->setGtdTime($gtdTime)
            ->setTriggerCondition($triggerCondition)
            ->setGuaranteed($guaranteed);

        return $stopLossOrderRequestEnvelope->setOrder($stopLossOrderRequest);
    }

    /**
     * @param string                      $instrument
     * @param \Brick\Math\BigDecimal      $units
     * @param \Brick\Money\Money          $price
     * @param \Brick\Money\Money          $priceBound
     * @param ClientExtension|null        $clientExtension
     * @param string                      $timeInForce
     * @param \DateTime|null              $gtdTime
     * @param string                      $positionFill
     * @param string                      $triggerCondition
     * @param TakeProfitDetail|null       $takeProfitOnFill
     * @param StopLossDetail|null         $stopLossOnFill
     * @param TrailingStopLossDetail|null $trailingStopLossOnFill
     * @param ClientExtension|null        $tradeClientExtensions
     *
     * @return StopOrderRequestEnvelope
     */
    public static function stopOrderRequest(
        string $instrument,
        BigDecimal $units,
        Money $price,
        string $timeInForce = TimeInForce::GTC,
        string $positionFill = OrderPositionFill::DEFAULT,
        string $triggerCondition = OrderTriggerCondition::DEFAULT,
        ?Money $priceBound = null,
        ?\DateTime $gtdTime = null,
        ?ClientExtension $clientExtension = null,
        ?TakeProfitDetail $takeProfitOnFill = null,
        ?StopLossDetail $stopLossOnFill = null,
        ?TrailingStopLossDetail $trailingStopLossOnFill = null,
        ?ClientExtension $tradeClientExtensions = null
    ): StopOrderRequestEnvelope {
        $stopOrderRequestEnvelope = new StopOrderRequestEnvelope();
        $stopOrderRequest = (new StopOrderRequest())
            ->setType(OrderType::STOP)
            ->setInstrument($instrument)
            ->setUnits($units)
            ->setPrice($price)
            ->setPriceBound($priceBound)
            ->setClientExtensions($clientExtension)
            ->setTimeInForce($timeInForce)
            ->setGtdTime($gtdTime)
            ->setPositionFill($positionFill)
            ->setTriggerCondition($triggerCondition)
            ->setTakeProfitOnFill($takeProfitOnFill)
            ->setStopLossOnFill($stopLossOnFill)
            ->setTrailingStopLossOnFill($trailingStopLossOnFill)
            ->setTradeClientExtensions($tradeClientExtensions);

        return $stopOrderRequestEnvelope->setOrder($stopOrderRequest);
    }

    /**
     * @param int                $tradeId
     * @param string             $clientTradeId
     * @param \Brick\Money\Money $price
     * @param ClientExtension    $clientExtension
     * @param string             $timeInForce
     * @param \DateTime|null     $gtdTime
     * @param string             $triggerCondition
     *
     * @return TakeProfitOrderRequestEnvelope
     */
    public static function takeProfitOrderRequest(
        int $tradeId,
        Money $price,
        ?string $clientTradeId = null,
        string $timeInForce = TimeInForce::GTC,
        string $triggerCondition = OrderTriggerCondition::DEFAULT,
        ClientExtension $clientExtension = null,
        \DateTime $gtdTime = null
    ): TakeProfitOrderRequestEnvelope {
        $takeProfitOrderRequestEnvelope = new TakeProfitOrderRequestEnvelope();
        $takeProfitOrderRequest = (new TakeProfitOrderRequest())
            ->setType(OrderType::TAKE_PROFIT)
            ->setTradeId($tradeId)
            ->setClientTradeId($clientTradeId)
            ->setPrice($price)
            ->setClientExtensions($clientExtension)
            ->setTimeInForce($timeInForce)
            ->setGtdTime($gtdTime)
            ->setTriggerCondition($triggerCondition);

        return $takeProfitOrderRequestEnvelope->setOrder($takeProfitOrderRequest);
    }

    /**
     * @param int                    $tradeId
     * @param string                 $clientTradeId
     * @param \Brick\Math\BigDecimal $distance
     * @param ClientExtension        $clientExtension
     * @param string                 $timeInForce
     * @param \DateTime|null         $gtdTime
     * @param string                 $triggerCondition
     *
     * @return TrailingStopLossOrderRequestEnvelope
     */
    public static function trailingStopLossOrderRequest(
        int $tradeId,
        BigDecimal $distance,
        ?string $clientTradeId = null,
        string $timeInForce = TimeInForce::GTC,
        string $triggerCondition = OrderTriggerCondition::DEFAULT,
        ClientExtension $clientExtension = null,
        \DateTime $gtdTime = null
    ): TrailingStopLossOrderRequestEnvelope {
        $trailingStopLossOrderRequestEnvelope = new TrailingStopLossOrderRequestEnvelope();
        $trailingStopLossOrderRequest = (new TrailingStopLossOrderRequest())
            ->setType(OrderType::TRAILING_STOP_LOSS)
            ->setTradeId($tradeId)
            ->setClientTradeId($clientTradeId)
            ->setDistance($distance)
            ->setClientExtensions($clientExtension)
            ->setTimeInForce($timeInForce)
            ->setGtdTime($gtdTime)
            ->setTriggerCondition($triggerCondition);

        return $trailingStopLossOrderRequestEnvelope->setOrder($trailingStopLossOrderRequest);
    }

    /**
     * @param ClientExtension      $orderClientExtension
     * @param ClientExtension|null $tradeClientExtension
     *
     * @return OrderClientExtensionsRequest
     */
    public static function clientExtensions(ClientExtension $orderClientExtension, ClientExtension $tradeClientExtension = null)
    {
        $clientExtensionsRequest = new OrderClientExtensionsRequest();

        return $clientExtensionsRequest->setClientExtensions($orderClientExtension)
            ->setTradeClientExtensions($tradeClientExtension);
    }
}
