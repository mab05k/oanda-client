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
use Mab05k\OandaClient\Client\AccountClient;
use Mab05k\OandaClient\Definition\Account\Account;
use Mab05k\OandaClient\Definition\Account\AccountChanges;
use Mab05k\OandaClient\Definition\Account\AccountCollection;
use Mab05k\OandaClient\Definition\Account\AccountProperty;
use Mab05k\OandaClient\Definition\Account\AccountState;
use Mab05k\OandaClient\Definition\Account\AccountSummary;
use Mab05k\OandaClient\Definition\Account\Instrument;
use Mab05k\OandaClient\Definition\Order\Order;
use Mab05k\OandaClient\Definition\Position\Position;
use Mab05k\OandaClient\Definition\Position\PositionSide;
use Mab05k\OandaClient\Definition\Trade\Trade;
use Mab05k\OandaClient\Definition\Transaction\Account\Configuration;
use Mab05k\OandaClient\Definition\Transaction\Transaction;
use Mab05k\OandaClient\Request\AccountRequestFactory;
use Mab05k\OandaClient\Response\Account\AccountChangesResponse;
use Mab05k\OandaClient\Response\Account\AccountResponse;
use Mab05k\OandaClient\Response\Account\AccountSummaryResponse;
use Mab05k\OandaClient\Response\Account\InstrumentResponse;

/**
 * Class AccountClientTest.
 */
class AccountClientTest extends AbstractClientTest
{
    /**
     * @var AccountClient
     */
    private $SUT;

    public function setUp()
    {
        parent::setUp();

        $this->SUT = new AccountClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testAccounts()
    {
        $this->createMockResponse(200, 'account/accounts.json');

        $result = $this->SUT->accounts();
        $account = $result->getAccounts()[0];
        $this->assertInstanceOf(AccountCollection::class, $result);
        $this->assertInstanceOf(AccountProperty::class, $account);
        $this->assertEquals('000-000-0000000-000', $account->getId());
        $this->assertEmpty($account->getTags());
    }

    public function testAccount()
    {
        $this->createMockResponse(200, 'account/account.json');
        $result = $this->SUT->account();

        $account = $result->getAccount();
        $this->assertInstanceOf(AccountResponse::class, $result);
        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals('1', $result->getLastTransactionId());
        $this->assertEquals('DISABLED', $account->getGuaranteedStopLossOrderMode());
        $this->assertFalse($account->getHedgingEnabled());
        $this->assertEquals('000-000-0000000-000', $account->getId());
        $this->assertInstanceOf(\DateTime::class, $account->getCreatedTime());
        $this->assertEquals('USD', $account->getCurrency());
        $this->assertEquals(1234567, $account->getCreatedByUserId());
        $this->assertEquals('Primary', $account->getAlias());
        $this->assertEquals(1, $account->getMarginRate()->getAmount()->toInt());
        $this->assertEquals('1', $account->getLastTransactionId());
        $this->assertEquals(100000.0000, $account->getBalance()->getAmount()->toFloat());
        $this->assertEquals(0, $account->getOpenTradeCount());
        $this->assertEquals(0, $account->getOpenPositionCount());
        $this->assertEquals(0, $account->getPendingOrderCount());
        $this->assertEquals(25.0000, $account->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(25.0000, $account->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertInstanceOf(\DateTime::class, $account->getResettablePlTime());
        $this->assertEquals(0.0000, $account->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getUnrealizedProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $account->getNav()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $account->getMarginAvailable()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getPositionValue()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutUnrealizedPl()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $account->getMarginCloseoutNav()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutPositionValue()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutPercent()->toFloat());
        $this->assertEquals(100000.0000, $account->getWithdrawalLimit()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCallMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCallPercent()->toFloat());

        $order = $account->getOrders()[0];
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals(1, $order->getId());
        $this->assertInstanceOf(\DateTime::class, $order->getCreateTime());
        $this->assertEquals('MARKET_IF_TOUCHED', $order->getType());
        $this->assertEquals('GBP_USD', $order->getInstrument());
        $this->assertEquals('GTC', $order->getTimeInForce());
        $this->assertEquals(1000, $order->getUnits()->toInt());
        $this->assertEquals(1.5000, $order->getPrice()->getAmount()->toFloat());
        $this->assertEquals('DEFAULT', $order->getTriggerCondition());
        $this->assertEquals('DEFAULT_FILL', $order->getPartialFill());
        $this->assertEquals('OPEN_ONLY', $order->getPositionFill());
        $this->assertEquals('PENDING', $order->getState());

        $position = $account->getPositions()[0];
        $this->assertInstanceOf(Position::class, $position);
        $this->assertEquals('EUR_USD', $position->getInstrument());
        $this->assertEquals(0.0000, $position->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getUnrealizedProfitLoss()->getAmount()->toFloat());

        $long = $position->getLong();
        $this->assertInstanceOf(PositionSide::class, $long);
        $this->assertEquals(0, $long->getUnits()->toInt());
        $this->assertEquals(0.0000, $long->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $long->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $long->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $long->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $long->getUnrealizedProfitLoss()->getAmount()->toFloat());

        $short = $position->getShort();
        $this->assertInstanceOf(PositionSide::class, $short);
        $this->assertEquals(0, $short->getUnits()->toInt());
        $this->assertEquals(0.0000, $short->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $short->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $short->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $short->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $short->getUnrealizedProfitLoss()->getAmount()->toFloat());
    }

    public function testAccountSummary()
    {
        $this->createMockResponse(200, 'account/account_summary.json');
        $result = $this->SUT->accountSummary();
        $this->assertInstanceOf(AccountSummaryResponse::class, $result);

        $account = $result->getAccount();
        $this->assertInstanceOf(AccountSummary::class, $account);
        $this->assertEquals('1', $result->getLastTransactionId());
        $this->assertEquals('DISABLED', $account->getGuaranteedStopLossOrderMode());
        $this->assertFalse($account->getHedgingEnabled());
        $this->assertEquals('000-000-0000000-000', $account->getId());
        $this->assertInstanceOf(\DateTime::class, $account->getCreatedTime());
        $this->assertEquals('USD', $account->getCurrency());
        $this->assertEquals(1234567, $account->getCreatedByUserId());
        $this->assertEquals('Primary', $account->getAlias());
        $this->assertEquals(1, $account->getMarginRate()->getAmount()->toInt());
        $this->assertEquals('1', $account->getLastTransactionId());
        $this->assertEquals(100000.0000, $account->getBalance()->getAmount()->toFloat());
        $this->assertEquals(0, $account->getOpenTradeCount());
        $this->assertEquals(0, $account->getOpenPositionCount());
        $this->assertEquals(0, $account->getPendingOrderCount());
        $this->assertEquals(0.0000, $account->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertInstanceOf(\DateTime::class, $account->getResettablePlTime());
        $this->assertEquals(0.0000, $account->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getUnrealizedProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $account->getNav()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $account->getMarginAvailable()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getPositionValue()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutUnrealizedPl()->getAmount()->toFloat());
        $this->assertEquals(100000.0000, $account->getMarginCloseoutNav()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutPositionValue()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCloseoutPercent()->toFloat());
        $this->assertEquals(100000.0000, $account->getWithdrawalLimit()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCallMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $account->getMarginCallPercent()->toFloat());
    }

    public function testInstruments()
    {
        $this->createMockResponse(200, 'account/instruments.json');
        $result = $this->SUT->instruments();
        $this->assertInstanceOf(InstrumentResponse::class, $result);

        $instrument = $result->getInstruments()[0];
        $this->assertInstanceOf(Instrument::class, $instrument);
        $this->assertEquals('USD_CNH', $instrument->getName());
        $this->assertEquals('CURRENCY', $instrument->getType());
        $this->assertEquals('USD/CNH', $instrument->getDisplayName());
        $this->assertEquals(-4, $instrument->getPipLocation());
        $this->assertEquals(5, $instrument->getDisplayPrecision());
        $this->assertEquals(0, $instrument->getTradeUnitsPrecision());
        $this->assertEquals(1, $instrument->getMinimumTradeSize()->getAmount()->toFloat());
        $this->assertEquals(1, $instrument->getMaximumTrailingStopDistance()->getAmount()->toFloat());
        $this->assertEquals(0.0005, $instrument->getMinimumTrailingStopDistance()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $instrument->getMaximumPositionSize()->getAmount()->toFloat());
        $this->assertEquals(100000000, $instrument->getMaximumOrderUnits()->toInt());
        $this->assertEquals(1, $instrument->getMarginRate()->getAmount()->toInt());
    }

    public function testConfiguration()
    {
        $this->createMockResponse(200, 'account/configuration.json');
        $result = $this->SUT->configuration(AccountRequestFactory::configuration(null, BigDecimal::of(1)));
        $this->assertInstanceOf(Configuration::class, $result);

        $clientConfigureTransaction = $result->getClientConfigureTransaction();
        $this->assertEquals('CLIENT_CONFIGURE', $clientConfigureTransaction->getType());
        $this->assertEquals(1234567, $clientConfigureTransaction->getUserId());
        $this->assertEquals(1, $clientConfigureTransaction->getId());
        $this->assertEquals(1, $clientConfigureTransaction->getBatchId());
        $this->assertEquals(1, $clientConfigureTransaction->getMarginRate()->toInt());
        $this->assertEquals('000-000-0000000-000', $clientConfigureTransaction->getAccountId());
        $this->assertEquals('42526785970370774', $clientConfigureTransaction->getRequestId());
        $this->assertInstanceOf(\DateTime::class, $clientConfigureTransaction->getTime());
    }

    public function testChanges()
    {
        $this->createMockResponse(200, 'account/changes.json');
        $result = $this->SUT->changes(1);
        $this->assertInstanceOf(AccountChangesResponse::class, $result);

        $this->assertEquals(1071, $result->getLastTransactionId());

        $changes = $result->getChanges();
        $this->assertInstanceOf(AccountChanges::class, $changes);

        $this->assertEmpty($changes->getOrdersCreated());
        $this->assertEmpty($changes->getOrdersTriggered());

        $this->assertCount(1, $changes->getOrdersCancelled());
        $this->assertInstanceOf(Order::class, $changes->getOrdersCancelled()[0]);

        $this->assertCount(1, $changes->getOrdersFilled());
        $this->assertInstanceOf(Order::class, $changes->getOrdersFilled()[0]);

        $this->assertEmpty($changes->getTradesOpened());
        $this->assertEmpty($changes->getTradesReduced());

        $this->assertCount(1, $changes->getTradesClosed());
        $this->assertInstanceOf(Trade::class, $changes->getTradesClosed()[0]);

        $this->assertCount(1, $changes->getPositions());
        $this->assertInstanceOf(Position::class, $changes->getPositions()[0]);

        $this->assertCount(1, $changes->getTransactions());
        $this->assertInstanceOf(Transaction::class, $changes->getTransactions()[0]);

        $state = $result->getState();
        $this->assertInstanceOf(AccountState::class, $state);
        $this->assertEquals(0.0000, $state->getUnrealizedProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(94984.8867, $state->getNav()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(94984.8867, $state->getMarginAvailable()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getPositionValue()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getMarginCloseoutUnrealizedPl()->getAmount()->toFloat());
        $this->assertEquals(94984.8867, $state->getMarginCloseoutNav()->getAmount()->toFloat());
        $this->assertEquals(94984.8867, $state->getWithdrawalLimit()->getAmount()->toFloat());
        $this->assertEquals(94984.8867, $state->getBalance()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getMarginCloseoutMarginUsed()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getMarginCloseoutPercent()->toFloat());
        $this->assertEquals(-12.6526, $state->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-12.6526, $state->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-2.4607, $state->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $state->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEmpty($state->getOrders());
        $this->assertEmpty($state->getTrades());
        $this->assertEmpty($state->getPositions());
    }
}
