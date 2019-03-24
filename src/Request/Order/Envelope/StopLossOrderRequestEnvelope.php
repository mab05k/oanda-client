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
use Mab05k\OandaClient\Request\Order\StopLossOrderRequest;

/**
 * Class StopLossOrderRequestEnvelope.
 */
class StopLossOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var StopLossOrderRequest|null
     *
     * @Serializer\SerializedName("order")
     * @Serializer\Type("Mab05k\OandaClient\Request\Order\StopLossOrderRequest")
     */
    private $order;

    /**
     * @return StopLossOrderRequest|null
     */
    public function getOrder(): ?StopLossOrderRequest
    {
        return $this->order;
    }

    /**
     * @param StopLossOrderRequest|null $order
     *
     * @return StopLossOrderRequestEnvelope
     */
    public function setOrder(?StopLossOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
