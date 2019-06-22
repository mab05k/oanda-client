<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Order\Envelope;

use Mab05k\OandaClient\Request\Order\MarketOrderRequest;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class MarketOrderRequest.
 */
class MarketOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var MarketOrderRequest|null
     *
     * @Serializer\SerializedName("order")
     */
    private $order;

    /**
     * @return MarketOrderRequest|null
     */
    public function getOrder(): ?MarketOrderRequest
    {
        return $this->order;
    }

    /**
     * @param MarketOrderRequest|null $order
     *
     * @return MarketOrderRequestEnvelope
     */
    public function setOrder(?MarketOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
