<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Order;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;

/**
 * Class OrderResponse.
 */
class OrderResponse
{
    use LastTransactionIdTrait;

    /**
     * @var Order|null
     *
     * @Serializer\SerializedName("order")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Order\Order")
     */
    private $order;

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param Order|null $order
     *
     * @return OrderResponse
     */
    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }
}
