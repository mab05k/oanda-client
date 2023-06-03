<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Order\Envelope;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Request\Order\TrailingStopLossOrderRequest;

/**
 * Class TrailingStopLossOrderRequestEnvelope.
 */
class TrailingStopLossOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var TrailingStopLossOrderRequest
     *
     * @Serializer\SerializedName("order")
     *
     * @Serializer\Type("Mab05k\OandaClient\Request\Order\TrailingStopLossOrderRequest")
     */
    private $order;

    /**
     * @return TrailingStopLossOrderRequest
     */
    public function getOrder(): TrailingStopLossOrderRequest
    {
        return $this->order;
    }

    /**
     * @param TrailingStopLossOrderRequest $order
     *
     * @return TrailingStopLossOrderRequestEnvelope
     */
    public function setOrder(TrailingStopLossOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
