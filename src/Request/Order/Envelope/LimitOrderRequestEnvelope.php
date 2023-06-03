<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Order\Envelope;

use Mab05k\OandaClient\Request\Order\LimitOrderRequest;

/**
 * Class LimitOrderRequestEnvelope.
 */
class LimitOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var LimitOrderRequest|null
     *
     * @Serializer\SerializedName("order")
     *
     * @Serializer\Type("Mab05k\OandaClient\Request\Order\LimitOrderRequest")
     */
    private $order;

    /**
     * @return LimitOrderRequest|null
     */
    public function getOrder(): ?LimitOrderRequest
    {
        return $this->order;
    }

    /**
     * @param LimitOrderRequest|null $order
     *
     * @return LimitOrderRequestEnvelope
     */
    public function setOrder(?LimitOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
