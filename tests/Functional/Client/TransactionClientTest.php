<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Mab05k\OandaClient\Client\TransactionClient;
use Mab05k\OandaClient\Definition\Transaction\Transaction;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;
use Mab05k\OandaClient\Request\Query\Transaction\From;
use Mab05k\OandaClient\Request\Query\Transaction\Id;
use Mab05k\OandaClient\Request\Query\Transaction\To;
use Mab05k\OandaClient\Response\Transaction\TransactionResponse;
use Mab05k\OandaClient\Response\Transaction\TransactionsPagesResponse;
use Mab05k\OandaClient\Response\Transaction\TransactionsResponse;

class TransactionClientTest extends AbstractClientTest
{
    /**
     * @var TransactionClient
     */
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();

        $this->SUT = new TransactionClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testTransactions()
    {
        $this->createMockResponse(200, 'transaction/transaction_pages.json');
        $transactionOptions = QueryBuilderFactory::transaction();

        $result = $this->SUT->transactions($transactionOptions);
        $this->assertInstanceOf(TransactionsPagesResponse::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result->getFrom());
        $this->assertInstanceOf(\DateTime::class, $result->getTo());
        $this->assertEquals(100, $result->getPageSize());
        $this->assertEquals(414, $result->getCount());
        $this->assertEquals(414, $result->getLastTransactionId());

        $pages = $result->getPages();
        $this->assertCount(5, $pages);
        $this->assertEquals($pages[0], 'https://api-fxpractice.oanda.com/v3/accounts/000-000-0000000-000/transactions/idrange?from=1&to=100');
    }

    public function testTransaction()
    {
        $this->createMockResponse(200, 'transaction/transaction.json');

        $result = $this->SUT->transaction('1');
        $this->assertInstanceOf(TransactionResponse::class, $result);
        $this->assertEquals(414, $result->getLastTransactionId());

        $transaction = $result->getTransaction();
        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertInstanceOf(\DateTime::class, $transaction->getTime());
        $this->assertEquals('CREATE', $transaction->getType());
        $this->assertEquals(1, $transaction->getId());
        $this->assertEquals(1, $transaction->getDivisionId());
        $this->assertEquals(1, $transaction->getBatchId());
        $this->assertEquals(101, $transaction->getSiteId());
        $this->assertEquals(1234567, $transaction->getAccountUserId());
        $this->assertEquals(7654321, $transaction->getUserId());
        $this->assertEquals('USD', $transaction->getHomeCurrency());
        $this->assertEquals('000-000-0000000-000', $transaction->getAccountId());
        $this->assertEquals('1753748261751290922', $transaction->getRequestId());
    }

    public function testSinceId()
    {
        $this->createMockResponse(200, 'transaction/sinceid.json');
        $transactionOptions = QueryBuilderFactory::create()
            ->add(Id::class, '1');

        $result = $this->SUT->sinceId($transactionOptions);
        $this->assertInstanceOf(TransactionsResponse::class, $result);

        $transactions = $result->getTransactions();
        $this->assertCount(2, $transactions);

        $transaction = $transactions[0];
        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertInstanceOf(\DateTime::class, $transaction->getTime());
        $this->assertEquals('MARKET_ORDER_REJECT', $transaction->getType());
        $this->assertEquals('CLOSEOUT_POSITION_DOESNT_EXIST', $transaction->getRejectReason());
        $this->assertEquals('EUR_USD', $transaction->getInstrument());
        $this->assertEquals('FOK', $transaction->getTimeInForce());
        $this->assertEquals('REDUCE_ONLY', $transaction->getPositionFill());
        $this->assertEquals('POSITION_CLOSEOUT', $transaction->getReason());
        $this->assertEquals('000-000-0000000-000', $transaction->getAccountId());
        $this->assertEquals('42530092137270721', $transaction->getRequestId());
        $this->assertEquals(413, $transaction->getId());
        $this->assertEquals(1234567, $transaction->getUserId());
        $this->assertEquals(412, $transaction->getBatchId());

        $transaction2 = $transactions[1];
        $this->assertEquals('DAILY_FINANCING', $transaction2->getType());
        $this->assertEquals('SECOND_BY_SECOND', $transaction2->getAccountFinancingMode());
        $this->assertEquals(-0.0083, $transaction2->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(99991.1237, $transaction2->getAccountBalance()->getAmount()->toFloat());
    }

    public function testIdRange()
    {
        $this->createMockResponse(200, 'transaction/idrange.json');
        $transactionOptions = QueryBuilderFactory::create()
            ->add(From::class, 1)
            ->add(To::class, 3);

        $result = $this->SUT->idRange($transactionOptions);
        $this->assertInstanceOf(TransactionsResponse::class, $result);

        $transactions = $result->getTransactions();
        $this->assertCount(2, $transactions);

        $transaction = $transactions[0];
        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertInstanceOf(\DateTime::class, $transaction->getTime());
        $this->assertEquals('DAILY_FINANCING', $transaction->getType());
        $this->assertEquals('SECOND_BY_SECOND', $transaction->getAccountFinancingMode());
        $this->assertEquals(-0.0082, $transaction->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(100003.6114, $transaction->getAccountBalance()->getAmount()->toFloat());
        $this->assertEquals(100, $transaction->getId());
        $this->assertEquals(0, $transaction->getUserId());
        $this->assertEquals('000-000-0000000-000', $transaction->getAccountId());
        $this->assertEquals(100, $transaction->getBatchId());
    }
}
