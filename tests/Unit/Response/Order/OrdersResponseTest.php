<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Response\Order;

use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Response\Order\OrdersResponse;
use PHPUnit\Framework\TestCase;

class OrdersResponseTest extends TestCase
{
    /**
     * @var OrdersResponse
     */
    private $SUT;

    protected function setUp(): void
    {
        $this->SUT = new OrdersResponse();
    }

    public function testGettersSetters()
    {
        $orders = [new Order()];
        $this->assertInstanceOf(OrdersResponse::class, $this->SUT->setOrders($orders));
        $this->assertInstanceOf(Order::class, $this->SUT->getOrders()[0]);
    }
}
