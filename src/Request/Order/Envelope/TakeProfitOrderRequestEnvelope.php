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
use Mab05k\OandaClient\Request\Order\TakeProfitOrderRequest;

/**
 * Class TakeProfitOrderRequest.
 */
class TakeProfitOrderRequestEnvelope implements OrderInterface
{
    /**
     * @var TakeProfitOrderRequest|null
     *
     * @Serializer\SerializedName("order")
     *
     * @Serializer\Type("Mab05k\OandaClient\Request\Order\TakeProfitOrderRequest")
     */
    private $order;

    /**
     * @return TakeProfitOrderRequest|null
     */
    public function getOrder(): ?TakeProfitOrderRequest
    {
        return $this->order;
    }

    /**
     * @param TakeProfitOrderRequest|null $order
     *
     * @return TakeProfitOrderRequestEnvelope
     */
    public function setOrder(?TakeProfitOrderRequest $order): self
    {
        $this->order = $order;

        return $this;
    }
}
