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
use Mab05k\OandaClient\Response\Order\OrderResponse;
use PHPUnit\Framework\TestCase;

class OrderResponseTest extends TestCase
{
    /**
     * @var OrderResponse
     */
    private $SUT;

    public function setUp(): void
    {
        $this->SUT = new OrderResponse();
    }

    public function testGettersSetters()
    {
        $order = new Order();
        $this->assertInstanceOf(OrderResponse::class, $this->SUT->setOrder($order));
        $this->assertInstanceOf(Order::class, $this->SUT->getOrder());
    }
}
