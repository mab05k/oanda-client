<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Brick\Math\BigDecimal;
use Mab05k\OandaClient\Client\OrderClient;
use Mab05k\OandaClient\Definition\Constant\MarketOrderReason;
use Mab05k\OandaClient\Definition\Constant\OrderPositionFill;
use Mab05k\OandaClient\Definition\Constant\OrderTriggerCondition;
use Mab05k\OandaClient\Definition\Constant\OrderType;
use Mab05k\OandaClient\Definition\Constant\TimeInForce;
use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Mab05k\OandaClient\Definition\Transaction\Order\FullPrice;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderCancelTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderCreateTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderFillTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderRejectTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderTransactionResponse;
use Mab05k\OandaClient\Definition\Transaction\Trade\TradeOpened;
use Mab05k\OandaClient\Helper\BrickMoneyHelper;
use Mab05k\OandaClient\Request\OrderRequestFactory;
use Mab05k\OandaClient\Request\Query\Order\State;
use Mab05k\OandaClient\Request\Query\Pricing\Instruments;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;
use Mab05k\OandaClient\Request\Query\Transaction\Type;
use Mab05k\OandaClient\Response\Order\OrderResponse;
use Mab05k\OandaClient\Response\Order\OrdersResponse;

class OrderClientTest extends AbstractClientTest
{
    /**
     * @var OrderClient
     */
    private $SUT;

    public function setUp()
    {
        parent::setUp();

        $this->SUT = new OrderClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testCreateMarketOrder()
    {
        $this->createMockResponse(201, 'order/market_order.json');
        $marketOrder = OrderRequestFactory::marketOrderRequest(
            'EUR_USD',
            BigDecimal::of(1000)
        );

        $result = $this->SUT->create($marketOrder);
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);
        $this->assertCount(2, $result->getRelatedTransactionIds());
        $this->assertEquals(2, $result->getLastTransactionId());

        $orderCreateTransaction = $result->getOrderCreateTransaction();
        $this->assertInstanceOf(OrderCreateTransaction::class, $orderCreateTransaction);
        $this->assertEquals(OrderType::MARKET_ORDER, $orderCreateTransaction->getType());
        $this->assertEquals('EUR_USD', $orderCreateTransaction->getInstrument());
        $this->assertEquals(1000, $orderCreateTransaction->getUnits()->toInt());
        $this->assertEquals(1, $orderCreateTransaction->getId());
        $this->assertEquals(1, $orderCreateTransaction->getBatchId());
        $this->assertEquals(1234567, $orderCreateTransaction->getUserId());
        $this->assertEquals('FOK', $orderCreateTransaction->getTimeInForce());
        $this->assertEquals('OPEN_ONLY', $orderCreateTransaction->getPositionFill());
        $this->assertEquals('CLIENT_ORDER', $orderCreateTransaction->getReason());
        $this->assertEquals('000-000-0000000-000', $orderCreateTransaction->getAccountId());
        $this->assertEquals('42445612591956348', $orderCreateTransaction->getRequestId());
        $this->assertInstanceOf(\DateTime::class, $orderCreateTransaction->getTime());

        $clientExtension = $orderCreateTransaction->getClientExtensions();
        $this->assertInstanceOf(ClientExtension::class, $clientExtension);
        $this->assertEquals('id', $clientExtension->getId());
        $this->assertEquals('tag', $clientExtension->getTag());

        $orderFillTransaction = $result->getOrderFillTransaction();
        $this->assertInstanceOf(OrderFillTransaction::class, $orderFillTransaction);
        $this->assertInstanceOf(\DateTime::class, $orderFillTransaction->getTime());
        $this->assertEquals('ORDER_FILL', $orderFillTransaction->getType());
        $this->assertEquals('id', $orderFillTransaction->getClientOrderId());
        $this->assertEquals('EUR_USD', $orderFillTransaction->getInstrument());
        $this->assertEquals('MARKET_ORDER', $orderFillTransaction->getReason());
        $this->assertEquals('000-000-0000000-000', $orderFillTransaction->getAccountId());
        $this->assertEquals('42445612591956348', $orderFillTransaction->getRequestId());

        $this->assertEquals(2, $orderFillTransaction->getOrderId());
        $this->assertEquals(2, $orderFillTransaction->getBatchId());
        $this->assertEquals(1234567, $orderFillTransaction->getUserId());
        $this->assertEquals(2, $orderFillTransaction->getid());
        $this->assertEquals(1, $orderFillTransaction->getGainQuoteHomeConversionFactor()->toInt());
        $this->assertEquals(1, $orderFillTransaction->getLossQuoteHomeConversionFactor()->toInt());
        $this->assertEquals(1000, $orderFillTransaction->getUnits()->toInt());
        $this->assertEquals(1.16555, $orderFillTransaction->getPrice()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $orderFillTransaction->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $orderFillTransaction->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $orderFillTransaction->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $orderFillTransaction->getGuaranteedExecutionFee()->getAmount()->toFloat());
        $this->assertEquals(0.0080, $orderFillTransaction->getHalfSpreadCost()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $orderFillTransaction->getAccountBalance()->getAmount()->toFloat());

        $tradeOpened = $orderFillTransaction->getTradeOpened();
        $this->assertInstanceOf(TradeOpened::class, $tradeOpened);
        $this->assertEquals(1.16555, $tradeOpened->getPrice()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $tradeOpened->getGuaranteedExecutionFee()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $tradeOpened->getHalfSpreadCost()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $tradeOpened->getInitialMarginRequired()->getAmount()->toFloat());
        $this->assertEquals(1, $tradeOpened->getTradeId());
        $this->assertEquals(1000, $tradeOpened->getUnits()->toInt());

        $fullPrice = $orderFillTransaction->getFullPrice();
        $this->assertInstanceOf(FullPrice::class, $fullPrice);
        $this->assertInstanceOf(\DateTime::class, $fullPrice->getTimestamp());
        $this->assertEquals(1.16524, $fullPrice->getCloseoutBid()->getAmount()->toFloat());
        $this->assertEquals(1.16570, $fullPrice->getCloseoutAsk()->getAmount()->toFloat());
        $this->assertCount(1, $fullPrice->getBids());
        $this->assertCount(1, $fullPrice->getAsks());
        $this->assertEquals(1.16539, $fullPrice->getBids()[0]->getPrice()->getAmount()->toFloat());
        $this->assertEquals(1.16555, $fullPrice->getAsks()[0]->getPrice()->getAmount()->toFloat());
    }

    public function testCreateMarketOrderMarketHalted()
    {
        $this->createMockResponse(201, 'order/error/market_halted.json');
        $marketOrder = OrderRequestFactory::marketOrderRequest(
            'EUR_USD',
            BigDecimal::of(1000)
        );

        $result = $this->SUT->create($marketOrder);
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);

        $orderCancelTransaction = $result->getOrderCancelTransaction();
        $this->assertInstanceOf(OrderCancelTransaction::class, $orderCancelTransaction);
        $this->assertInstanceOf(\DateTime::class, $orderCancelTransaction->getTime());
        $this->assertEquals('ORDER_CANCEL', $orderCancelTransaction->getType());
        $this->assertEquals('id', $orderCancelTransaction->getClientOrderId());
        $this->assertEquals('MARKET_HALTED', $orderCancelTransaction->getReason());
        $this->assertEquals('000-000-0000000-000', $orderCancelTransaction->getAccountId());
        $this->assertEquals('24514834665124128', $orderCancelTransaction->getRequestId());
        $this->assertEquals(2, $orderCancelTransaction->getOrderId());
        $this->assertEquals(2, $orderCancelTransaction->getId());
        $this->assertEquals(2, $orderCancelTransaction->getBatchId());
        $this->assertEquals(1234567, $orderCancelTransaction->getUserId());
    }

    public function testOrderRejectTransaction()
    {
        $this->createMockResponse(201, 'order/error/order_rejected.json');
        $marketOrder = OrderRequestFactory::marketOrderRequest(
            'EUR_USD',
            BigDecimal::of(1000)
        );

        $result = $this->SUT->create($marketOrder);
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);
        $this->assertEquals('PRICE_PRECISION_EXCEEDED', $result->getErrorCode());
        $this->assertEquals('The price specified contains more precision than is allowed for the instrument', $result->getErrorMessage());

        $orderRejectTransaction = $result->getOrderRejectTransaction();
        $this->assertInstanceOf(OrderRejectTransaction::class, $orderRejectTransaction);
        $this->assertInstanceOf(\DateTime::class, $orderRejectTransaction->getTime());
        $this->assertEquals('MARKET_IF_TOUCHED_ORDER_REJECT', $orderRejectTransaction->getType());
        $this->assertEquals('GBP_USD', $orderRejectTransaction->getInstrument());
        $this->assertEquals('GTC', $orderRejectTransaction->getTimeInForce());
        $this->assertEquals('DEFAULT', $orderRejectTransaction->getTriggerCondition());
        $this->assertEquals('DEFAULT', $orderRejectTransaction->getPartialFill());
        $this->assertEquals('OPEN_ONLY', $orderRejectTransaction->getPositionFill());
        $this->assertEquals('CLIENT_ORDER', $orderRejectTransaction->getReason());
        $this->assertEquals('PRICE_PRECISION_EXCEEDED', $orderRejectTransaction->getRejectReason());
        $this->assertEquals('60543718328515697', $orderRejectTransaction->getRequestId());
        $this->assertEquals('000-000-0000000-000', $orderRejectTransaction->getAccountId());
        $this->assertEquals(101, $orderRejectTransaction->getUnits()->toInt());
        $this->assertEquals(1, $orderRejectTransaction->getId());
        $this->assertEquals(1, $orderRejectTransaction->getBatchId());
        $this->assertEquals(1234567, $orderRejectTransaction->getUserId());
        $this->assertEquals(1.33688, $orderRejectTransaction->getPrice()->getAmount()->toFloat());
    }

    public function testCancelOrder()
    {
        $this->createMockResponse(200, 'order/cancel_order.json');

        $result = $this->SUT->cancel('1');
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);

        $orderCancelTransaction = $result->getOrderCancelTransaction();
        $this->assertInstanceOf(OrderCancelTransaction::class, $orderCancelTransaction);
        $this->assertInstanceOf(\DateTime::class, $orderCancelTransaction->getTime());

        $this->assertEquals('ORDER_CANCEL', $orderCancelTransaction->getType());
        $this->assertEquals('CLIENT_REQUEST', $orderCancelTransaction->getReason());
        $this->assertEquals('78555572259378545', $orderCancelTransaction->getRequestId());
        $this->assertEquals('000-000-0000000-000', $orderCancelTransaction->getAccountId());

        $this->assertEquals(2, $orderCancelTransaction->getOrderId());
        $this->assertEquals(1, $orderCancelTransaction->getId());
        $this->assertEquals(1, $orderCancelTransaction->getBatchId());
        $this->assertEquals(1234567, $orderCancelTransaction->getUserId());
    }

    public function testCreateStopLoss()
    {
        $this->createMockResponse(201, 'order/stop_loss_order.json');
        $stopLossOrder = OrderRequestFactory::stopLossOrderRequest(
            1,
            BrickMoneyHelper::create(1.1234),
            BigDecimal::of(.05),
            'id'
        );

        $result = $this->SUT->create($stopLossOrder);
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);
        $orderCreateTransaction = $result->getOrderCreateTransaction();
        $this->assertNull($result->getOrderFillTransaction());
        $this->assertInstanceOf(OrderCreateTransaction::class, $orderCreateTransaction);

        $this->assertInstanceOf(\DateTime::class, $orderCreateTransaction->getTime());
        $this->assertEquals(Type::STOP_LOSS_ORDER, $orderCreateTransaction->getType());
        $this->assertEquals(TimeInForce::GTC, $orderCreateTransaction->getTimeInForce());
        $this->assertEquals(OrderTriggerCondition::DEFAULT, $orderCreateTransaction->getTriggerCondition());
        $this->assertEquals(MarketOrderReason::CLIENT_ORDER, $orderCreateTransaction->getReason());
        $this->assertEquals(1, $orderCreateTransaction->getTradeId());
        $this->assertEquals(1, $orderCreateTransaction->getId());
        $this->assertEquals(1, $orderCreateTransaction->getBatchId());
        $this->assertEquals(1234567, $orderCreateTransaction->getUserId());
        $this->assertEquals('000-000-0000000-000', $orderCreateTransaction->getAccountId());
        $this->assertEquals('60543720950937234', $orderCreateTransaction->getRequestId());
        $this->assertEquals(BrickMoneyHelper::create(1.1), $orderCreateTransaction->getPrice());
        $this->assertFalse($orderCreateTransaction->getGuaranteed());

        $clientExtension = $orderCreateTransaction->getClientExtensions();
        $this->assertInstanceOf(ClientExtension::class, $clientExtension);
        $this->assertEquals('id', $clientExtension->getId());
        $this->assertEquals('tag', $clientExtension->getTag());
    }

    public function testCreateMarketIfTouchedOrder()
    {
        $this->createMockResponse(201, 'order/market_if_touched_order.json');
        $marketIfTouchedOrder = OrderRequestFactory::marketIfTouchedOrderRequest(
            'EUR_USD',
            BigDecimal::of(1000),
            BrickMoneyHelper::create(1.1234)
        );

        $result = $this->SUT->create($marketIfTouchedOrder);
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);
        $orderCreateTransaction = $result->getOrderCreateTransaction();
        $this->assertNull($result->getOrderFillTransaction());
        $this->assertInstanceOf(OrderCreateTransaction::class, $orderCreateTransaction);

        $this->assertInstanceOf(\DateTime::class, $orderCreateTransaction->getTime());
        $this->assertEquals(Type::MARKET_IF_TOUCHED_ORDER, $orderCreateTransaction->getType());
        $this->assertEquals(TimeInForce::GTC, $orderCreateTransaction->getTimeInForce());
        $this->assertEquals(OrderTriggerCondition::DEFAULT, $orderCreateTransaction->getTriggerCondition());
        $this->assertEquals(MarketOrderReason::CLIENT_ORDER, $orderCreateTransaction->getReason());
        $this->assertEquals(1, $orderCreateTransaction->getId());
        $this->assertEquals(1, $orderCreateTransaction->getBatchId());
        $this->assertEquals(1234567, $orderCreateTransaction->getUserId());
        $this->assertEquals('000-000-0000000-000', $orderCreateTransaction->getAccountId());
        $this->assertEquals('60543718882369859', $orderCreateTransaction->getRequestId());
        $this->assertEquals(BrickMoneyHelper::create(1.33600), $orderCreateTransaction->getPrice());
        $this->assertEquals(BigDecimal::of(100), $orderCreateTransaction->getUnits());
    }

    public function testOrders()
    {
        $this->createMockResponse(200, 'order/orders.json');
        $ordersOptions = QueryBuilderFactory::orders();

        $result = $this->SUT->orders($ordersOptions);
        $this->assertInstanceOf(OrdersResponse::class, $result);
        $this->assertCount(1, $result->getOrders());

        $order = $result->getOrders()[0];
        $this->assertInstanceOf(Order::class, $order);
        $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
        $this->assertEquals(1, $order->getId());
        $this->assertEquals(OrderType::MARKET_IF_TOUCHED, $order->getType());
        $this->assertEquals(Instruments::GBP_USD, $order->getInstrument());
        $this->assertEquals(TimeInForce::GTC, $order->getTimeInForce());
        $this->assertEquals(OrderTriggerCondition::DEFAULT, $order->getTriggerCondition());
        $this->assertEquals('DEFAULT_FILL', $order->getPartialFill());
        $this->assertEquals(OrderPositionFill::OPEN_ONLY, $order->getPositionFill());
        $this->assertEquals(State::PENDING, $order->getState());
        $this->assertEquals(BigDecimal::of(101), $order->getUnits());
        $this->assertEquals(BrickMoneyHelper::create(1.33600), $order->getPrice());
    }

    public function testPendingOrders()
    {
        $this->createMockResponse(200, 'order/pending_orders.json');

        $result = $this->SUT->pendingOrders();
        $this->assertInstanceOf(OrdersResponse::class, $result);
        $this->assertCount(1, $result->getOrders());

        $order = $result->getOrders()[0];
        $this->assertInstanceOf(Order::class, $order);
        $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
        $this->assertEquals(1, $order->getId());
        $this->assertEquals(OrderType::MARKET_IF_TOUCHED, $order->getType());
        $this->assertEquals(Instruments::GBP_USD, $order->getInstrument());
        $this->assertEquals(TimeInForce::GTC, $order->getTimeInForce());
        $this->assertEquals(OrderTriggerCondition::DEFAULT, $order->getTriggerCondition());
        $this->assertEquals('DEFAULT_FILL', $order->getPartialFill());
        $this->assertEquals(OrderPositionFill::OPEN_ONLY, $order->getPositionFill());
        $this->assertEquals(State::PENDING, $order->getState());
        $this->assertEquals(BigDecimal::of(101), $order->getUnits());
        $this->assertEquals(BrickMoneyHelper::create(1.33600), $order->getPrice());
    }

    public function testOrder()
    {
        $this->createMockResponse(200, 'order/order.json');

        $result = $this->SUT->order('1');
        $this->assertInstanceOf(OrderResponse::class, $result);

        $order = $result->getOrder();
        $this->assertInstanceOf(Order::class, $order);
        $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
        $this->assertEquals(1, $order->getId());
        $this->assertEquals(OrderType::MARKET_IF_TOUCHED, $order->getType());
        $this->assertEquals(Instruments::GBP_USD, $order->getInstrument());
        $this->assertEquals(TimeInForce::GTC, $order->getTimeInForce());
        $this->assertEquals(OrderTriggerCondition::DEFAULT, $order->getTriggerCondition());
        $this->assertEquals('DEFAULT_FILL', $order->getPartialFill());
        $this->assertEquals(OrderPositionFill::OPEN_ONLY, $order->getPositionFill());
        $this->assertEquals(State::PENDING, $order->getState());
        $this->assertEquals(BigDecimal::of(101), $order->getUnits());
        $this->assertEquals(BrickMoneyHelper::create(1.33600), $order->getPrice());
    }
}
