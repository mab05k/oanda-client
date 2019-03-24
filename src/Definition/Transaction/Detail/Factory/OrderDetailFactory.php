<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Detail\Factory;

use Brick\Math\BigDecimal;
use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Constant\TimeInForce;
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Mab05k\OandaClient\Definition\Transaction\Detail\StopLossDetail;
use Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail;
use Mab05k\OandaClient\Definition\Transaction\Detail\TrailingStopLossDetail;

/**
 * Class OrderDetailFactory.
 */
class OrderDetailFactory
{
    /**
     * @param Money                $price
     * @param \DateTime            $goodUntilDate
     * @param string               $timeInForce
     * @param ClientExtension|null $clientExtension
     *
     * @return TakeProfitDetail
     */
    public static function takeProfitDetail(
        Money $price,
        \DateTime $goodUntilDate,
        string $timeInForce = TimeInForce::GTC,
        ClientExtension $clientExtension = null
    ): TakeProfitDetail {
        return (new TakeProfitDetail())
            ->setPrice($price)
            ->setGtdTime($goodUntilDate)
            ->setTimeInForce($timeInForce)
            ->setClientExtensions($clientExtension);
    }

    /**
     * @param Money                $price
     * @param BigDecimal           $distance
     * @param \DateTime            $goodUntilDate
     * @param string               $timeInForce
     * @param ClientExtension|null $clientExtension
     * @param bool                 $guaranteed
     *
     * @return StopLossDetail
     */
    public static function stopLossDetail(
        Money $price,
        BigDecimal $distance,
        \DateTime $goodUntilDate,
        string $timeInForce = TimeInForce::GTC,
        ClientExtension $clientExtension = null,
        bool $guaranteed = false
    ): StopLossDetail {
        return (new StopLossDetail())
            ->setPrice($price)
            ->setDistance($distance)
            ->setGtdTime($goodUntilDate)
            ->setTimeInForce($timeInForce)
            ->setClientExtensions($clientExtension)
            ->setGuaranteed($guaranteed);
    }

    /**
     * @param BigDecimal           $distance
     * @param \DateTime            $goodUntilDate
     * @param string               $timeInForce
     * @param ClientExtension|null $clientExtension
     *
     * @return TrailingStopLossDetail
     */
    public static function trailingStopLossDetail(
        BigDecimal $distance,
        \DateTime $goodUntilDate,
        string $timeInForce = TimeInForce::GTC,
        ClientExtension $clientExtension = null
    ): TrailingStopLossDetail {
        return (new TrailingStopLossDetail())
            ->setDistance($distance)
            ->setGtdTime($goodUntilDate)
            ->setTimeInForce($timeInForce)
            ->setClientExtensions($clientExtension);
    }
}
