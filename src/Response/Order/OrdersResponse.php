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
 * Class Orders.
 */
class OrdersResponse
{
    use LastTransactionIdTrait;

    /**
     * @var array|Order[]|null
     *
     * @Serializer\SerializedName("orders")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Order\Order>")
     */
    private $orders;

    /**
     * @return array|Order[]|null
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param array|Order[]|null $orders
     *
     * @return OrdersResponse
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }
}
