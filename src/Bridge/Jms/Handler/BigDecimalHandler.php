<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Bridge\Jms\Handler;

use Brick\Math\BigDecimal;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

/**
 * Class BigDecimalHandler.
 */
class BigDecimalHandler implements SubscribingHandlerInterface
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
                'type' => BigDecimal::class,
                'method' => 'serializeBigDecimal',
            ],
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => BigDecimal::class,
                'method' => 'deserializeBigDecimal',
            ],
        ];
    }

    public function serializeBigDecimal(JsonSerializationVisitor $visitor, $bigDecimal, array $type, Context $context)
    {
        if (!$bigDecimal instanceof BigDecimal) {
            throw new \Exception('Invalid Type passed to BigDecimalHandler');
        }

        return $bigDecimal->jsonSerialize();
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param                            $bigDecimal
     * @param array                      $type
     * @param Context                    $context
     *
     * @return BigDecimal
     */
    public function deserializeBigDecimal(JsonDeserializationVisitor $visitor, $bigDecimal, array $type, Context $context)
    {
        return BigDecimal::of($bigDecimal);
    }
}
