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
use Mab05k\OandaClient\Client\TradeClient;
use Mab05k\OandaClient\Definition\Constant\MarketOrderReason;
use Mab05k\OandaClient\Definition\Constant\OrderFillReason;
use Mab05k\OandaClient\Definition\Constant\OrderPositionFill;
use Mab05k\OandaClient\Definition\Constant\TimeInForce;
use Mab05k\OandaClient\Definition\Order\StopLossOrder;
use Mab05k\OandaClient\Definition\Pricing\PriceBucket;
use Mab05k\OandaClient\Definition\Trade\Trade;
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderTradeClose;
use Mab05k\OandaClient\Definition\Transaction\Order\FullPrice;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderCreateTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderFillTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderTransactionResponse;
use Mab05k\OandaClient\Definition\Transaction\Trade\TradeClosed;
use Mab05k\OandaClient\Helper\BrickMoneyHelper;
use Mab05k\OandaClient\Request\Query\Pricing\Instruments;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;
use Mab05k\OandaClient\Request\Query\Trade\State;
use Mab05k\OandaClient\Request\Query\Transaction\Type;
use Mab05k\OandaClient\Request\TradeRequestFactory;
use Mab05k\OandaClient\Response\Trade\TradeResponse;
use Mab05k\OandaClient\Response\Trade\TradesResponse;

class TradeClientTest extends AbstractClientTest
{
    /**
     * @var TradeClient
     */
    private $SUT;

    public function setUp()
    {
        parent::setUp();

        $this->SUT = new TradeClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testTrades()
    {
        $this->createMockResponse(200, 'trade/trades.json');
        $tradeOptions = QueryBuilderFactory::trade();

        $result = $this->SUT->trades($tradeOptions);
        $this->assertInstanceOf(TradesResponse::class, $result);
        $this->assertEquals('2', $result->getLastTransactionId());

        $trades = $result->getTrades();
        $this->assertCount(1, $trades);

        $trade = $trades[0];
        $this->assertInstanceOf(Trade::class, $trade);
        $this->assertEquals(1, $trade->getId());
        $this->assertEquals('EUR_USD', $trade->getInstrument());
        $this->assertEquals('OPEN', $trade->getState());
        $this->assertEquals(1.13257, $trade->getPrice()->getAmount()->toFloat());
        $this->assertInstanceOf(\DateTime::class, $trade->getOpenTime());
        $this->assertEquals(100, $trade->getInitialUnits()->toInt());
        $this->assertEquals(100, $trade->getCurrentUnits()->toInt());
        $this->assertEquals(113.25000, $trade->getInitialMarginRequired()->getAmount()->toFloat());
        $this->assertEquals(113.27300, $trade->getMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $trade->getRealizedPl()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $trade->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0090, $trade->getUnrealizedPl()->getAmount()->toFloat());

        $stopLossOrder = $trade->getStopLossOrder();
        $this->assertInstanceOf(StopLossOrder::class, $stopLossOrder);
        $this->assertEquals(2, $stopLossOrder->getId());
        $this->assertEquals(1, $stopLossOrder->getTradeId());
        $this->assertInstanceOf(\DateTime::class, $stopLossOrder->getCreateTime());
        $this->assertEquals('STOP_LOSS', $stopLossOrder->getType());
        $this->assertEquals('PENDING', $stopLossOrder->getState());
        $this->assertEquals('GTC', $stopLossOrder->getTimeInForce());
        $this->assertEquals('DEFAULT', $stopLossOrder->getTriggerCondition());
        $this->assertEquals(1.1000, $stopLossOrder->getPrice()->getAmount()->toFloat());
        $this->assertFalse($stopLossOrder->getGuaranteed());

        $clientExtension = $stopLossOrder->getClientExtensions();
        $this->assertInstanceOf(ClientExtension::class, $clientExtension);
        $this->assertEquals('id', $clientExtension->getId());
        $this->assertEquals('tag', $clientExtension->getTag());
    }

    public function testTrade()
    {
        $this->createMockResponse(200, 'trade/trade.json');

        $result = $this->SUT->trade('1');
        $this->assertInstanceOf(TradeResponse::class, $result);

        $trade = $result->getTrade();
        $this->assertInstanceOf(Trade::class, $trade);
        $this->assertInstanceOf(\DateTime::class, $trade->getOpenTime());
        $this->assertEquals(1, $trade->getId());
        $this->assertEquals(Instruments::EUR_USD, $trade->getInstrument());
        $this->assertEquals(State::OPEN, $trade->getState());
        $this->assertEquals(BrickMoneyHelper::create(1.13387), $trade->getPrice());
        $this->assertEquals(BrickMoneyHelper::create(113.3800), $trade->getInitialMarginRequired());
        $this->assertEquals(BrickMoneyHelper::create(113.3900), $trade->getMarginUsed());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $trade->getRealizedPl());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $trade->getFinancing());
        $this->assertEquals(BrickMoneyHelper::create(-0.0040), $trade->getUnrealizedPl());
        $this->assertEquals(BigDecimal::of(100), $trade->getInitialUnits());
        $this->assertEquals(BigDecimal::of(100), $trade->getCurrentUnits());
    }

    public function testOpenTrades()
    {
        $this->createMockResponse(200, 'trade/open_trades.json');

        $result = $this->SUT->openTrades();
        $this->assertInstanceOf(TradesResponse::class, $result);

        $trades = $result->getTrades();
        $this->assertCount(1, $trades);

        $trade = $trades[0];
        $this->assertInstanceOf(Trade::class, $trade);
        $this->assertInstanceOf(\DateTime::class, $trade->getOpenTime());
        $this->assertEquals(1, $trade->getId());
        $this->assertEquals(Instruments::EUR_USD, $trade->getInstrument());
        $this->assertEquals(State::OPEN, $trade->getState());
        $this->assertEquals(BrickMoneyHelper::create(1.13387), $trade->getPrice());
        $this->assertEquals(BrickMoneyHelper::create(113.3800), $trade->getInitialMarginRequired());
        $this->assertEquals(BrickMoneyHelper::create(113.3800), $trade->getMarginUsed());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $trade->getRealizedPl());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $trade->getFinancing());
        $this->assertEquals(BrickMoneyHelper::create(-0.0140), $trade->getUnrealizedPl());
        $this->assertEquals(BigDecimal::of(100), $trade->getInitialUnits());
        $this->assertEquals(BigDecimal::of(100), $trade->getCurrentUnits());
    }

    public function testClose()
    {
        $this->createMockResponse(200, 'trade/close_trade.json');
        $closeTradeRequest = TradeRequestFactory::closeTradeRequest();

        $result = $this->SUT->close('1', $closeTradeRequest);
        $this->assertInstanceOf(OrderTransactionResponse::class, $result);

        $orderCreateTransaction = $result->getOrderCreateTransaction();
        $this->assertInstanceOf(OrderCreateTransaction::class, $orderCreateTransaction);
        $this->assertInstanceOf(\DateTime::class, $orderCreateTransaction->getTime());
        $this->assertEquals(Type::MARKET_ORDER, $orderCreateTransaction->getType());
        $this->assertEquals(Instruments::EUR_USD, $orderCreateTransaction->getInstrument());
        $this->assertEquals(TimeInForce::FOK, $orderCreateTransaction->getTimeInForce());
        $this->assertEquals(OrderPositionFill::REDUCE_ONLY, $orderCreateTransaction->getPositionFill());
        $this->assertEquals(MarketOrderReason::TRADE_CLOSE, $orderCreateTransaction->getReason());
        $this->assertEquals(BigDecimal::of(-100), $orderCreateTransaction->getUnits());
        $this->assertEquals(377, $orderCreateTransaction->getId());
        $this->assertEquals(1234567, $orderCreateTransaction->getUserId());
        $this->assertEquals(377, $orderCreateTransaction->getBatchId());
        $this->assertEquals('000-000-0000000-000', $orderCreateTransaction->getAccountId());
        $this->assertEquals('78555571906963377', $orderCreateTransaction->getRequestId());

        $tradeClose = $orderCreateTransaction->getTradeClose();
        $this->assertInstanceOf(MarketOrderTradeClose::class, $tradeClose);
        $this->assertEquals('ALL', $tradeClose->getUnits());
        $this->assertEquals(374, $tradeClose->getTradeId());

        $orderFillTransaction = $result->getOrderFillTransaction();
        $this->assertInstanceOf(OrderFillTransaction::class, $orderFillTransaction);
        $this->assertEquals(Type::ORDER_FILL, $orderFillTransaction->getType());
        $this->assertEquals(377, $orderFillTransaction->getOrderId());
        $this->assertEquals(378, $orderFillTransaction->getId());
        $this->assertEquals(Instruments::EUR_USD, $orderFillTransaction->getInstrument());
        $this->assertEquals(OrderFillReason::MARKET_ORDER_TRADE_CLOSE, $orderFillTransaction->getReason());
        $this->assertEquals(BigDecimal::of(-100), $orderFillTransaction->getUnits());
        $this->assertEquals(BigDecimal::of(-100), $orderFillTransaction->getRequestedUnits());
        $this->assertEquals(BigDecimal::of(1), $orderFillTransaction->getGainQuoteHomeConversionFactor());
        $this->assertEquals(BigDecimal::of(1), $orderFillTransaction->getLossQuoteHomeConversionFactor());
        $this->assertEquals(BrickMoneyHelper::create(1.14541), $orderFillTransaction->getPrice());
        $this->assertEquals(BrickMoneyHelper::create(-0.0420), $orderFillTransaction->getPl());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $orderFillTransaction->getFinancing());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $orderFillTransaction->getCommission());
        $this->assertEquals(BrickMoneyHelper::create(0.0), $orderFillTransaction->getGuaranteedExecutionFee());
        $this->assertEquals(BrickMoneyHelper::create(0.0075), $orderFillTransaction->getHalfSpreadCost());
        $this->assertEquals(BrickMoneyHelper::create(1.14541), $orderFillTransaction->getFullVWap());
        $this->assertEquals(BrickMoneyHelper::create(99991.1832), $orderFillTransaction->getAccountBalance());
        $this->assertEquals('000-000-0000000-000', $orderCreateTransaction->getAccountId());
        $this->assertEquals('78555571906963377', $orderCreateTransaction->getRequestId());
        $this->assertEquals(1234567, $orderCreateTransaction->getUserId());
        $this->assertEquals(377, $orderCreateTransaction->getBatchId());

        $tradesClosed = $orderFillTransaction->getTradesClosed();
        $this->assertCount(1, $tradesClosed);
        $tradeClosed = $tradesClosed[0];
        $this->assertInstanceOf(TradeClosed::class, $tradeClosed);
        $this->assertEquals(374, $tradeClosed->getTradeId());
        $this->assertEquals(BigDecimal::of(-100), $tradeClosed->getUnits());
        $this->assertEquals(BrickMoneyHelper::create(-0.0420), $tradeClosed->getRealizedPl());
        $this->assertEquals(BrickMoneyHelper::create(0.00), $tradeClosed->getFinancing());
        $this->assertEquals(BrickMoneyHelper::create(0.00), $tradeClosed->getGuaranteedExecutionFee());
        $this->assertEquals(BrickMoneyHelper::create(0.0075), $tradeClosed->getHalfSpreadCost());
        $this->assertEquals(BrickMoneyHelper::create(1.14541), $tradeClosed->getPrice());

        $fullPrice = $orderFillTransaction->getFullPrice();
        $this->assertInstanceOf(FullPrice::class, $fullPrice);
        $this->assertInstanceOf(\DateTime::class, $fullPrice->getTimestamp());
        $this->assertEquals(BrickMoneyHelper::create(1.14526), $fullPrice->getCloseoutBid());
        $this->assertEquals(BrickMoneyHelper::create(1.14571), $fullPrice->getCloseoutAsk());

        $bids = $fullPrice->getBids();
        $this->assertCount(1, $bids);
        $bid = $bids[0];
        $this->assertInstanceOf(PriceBucket::class, $bid);
        $this->assertEquals(BrickMoneyHelper::create(1.14541), $bid->getPrice());
        $this->assertEquals(BigDecimal::of(10000000), $bid->getLiquidity());

        $asks = $fullPrice->getAsks();
        $this->assertCount(1, $asks);
        $ask = $asks[0];
        $this->assertInstanceOf(PriceBucket::class, $ask);
        $this->assertEquals(BrickMoneyHelper::create(1.14556), $ask->getPrice());
        $this->assertEquals(BigDecimal::of(10000000), $ask->getLiquidity());
    }
}
