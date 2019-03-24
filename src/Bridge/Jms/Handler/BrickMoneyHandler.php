<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Bridge\Jms\Handler;

use Brick\Money\Money;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use Mab05k\OandaClient\Helper\BrickMoneyHelper;

/**
 * Class BrickMoneyHandler.
 */
class BrickMoneyHandler implements SubscribingHandlerInterface
{
    /**
     * @return array
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => Money::class,
                'method' => 'serializeMoney',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => Money::class,
                'method' => 'deserializeMoney',
            ],
        ];
    }

    /**
     * @param JsonSerializationVisitor $visitor
     * @param $money
     * @param array   $type
     * @param Context $context
     *
     * @throws \Exception
     *
     * @return \Brick\Math\BigDecimal
     */
    public function serializeMoney(JsonSerializationVisitor $visitor, $money, array $type, Context $context)
    {
        if (!$money instanceof Money) {
            throw new \Exception('Invalid Type passed to BrickMoneyHandler');
        }

        return $money->getAmount();
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param $money
     * @param array   $type
     * @param Context $context
     *
     * @return Money
     */
    public function deserializeMoney(JsonDeserializationVisitor $visitor, $money, array $type, Context $context)
    {
        return BrickMoneyHelper::create($money);
    }
}
