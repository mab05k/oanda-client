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
use Mab05k\OandaClient\Request\Order\MarketIfTouchedOrderRequest;

/**
 * Class MarketIfTouchedOrderRequest.
 */
class MarketIfTouchedOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var MarketIfTouchedOrderRequest|null
     *
     * @Serializer\SerializedName("order")
     *
     * @Serializer\Type("Mab05k\OandaClient\Request\Order\MarketIfTouchedOrderRequest")
     */
    private $order;

    /**
     * @return MarketIfTouchedOrderRequest|null
     */
    public function getOrder(): ?MarketIfTouchedOrderRequest
    {
        return $this->order;
    }

    /**
     * @param MarketIfTouchedOrderRequest|null $order
     *
     * @return MarketIfTouchedOrderRequestEnvelope
     */
    public function setOrder(?MarketIfTouchedOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
