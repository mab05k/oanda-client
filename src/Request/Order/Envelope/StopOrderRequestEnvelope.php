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
use Mab05k\OandaClient\Request\Order\StopOrderRequest;

/**
 * Class StopOrderRequestEnvelope.
 */
class StopOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var StopOrderRequest|null
     *
     * @Serializer\SerializedName("order")
     *
     * @Serializer\Type("Mab05k\OandaClient\Request\Order\StopOrderRequest")
     */
    private $order;

    /**
     * @return StopOrderRequest|null
     */
    public function getOrder(): ?StopOrderRequest
    {
        return $this->order;
    }

    /**
     * @param StopOrderRequest|null $order
     *
     * @return StopOrderRequestEnvelope
     */
    public function setOrder(?StopOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
