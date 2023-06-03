<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Mab05k\OandaClient\Client\PositionClient;
use Mab05k\OandaClient\Definition\Transaction\MarketOrder\MarketOrderPositionCloseout;
use Mab05k\OandaClient\Definition\Transaction\Order\MarketOrderTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderFillTransaction;
use Mab05k\OandaClient\Request\PositionRequestFactory;
use Mab05k\OandaClient\Response\Position\ClosePositionResponse;
use Mab05k\OandaClient\Response\Position\PositionResponse;
use Mab05k\OandaClient\Response\Position\PositionsResponse;

class PositionClientTest extends AbstractClientTest
{
    /**
     * @var PositionClient
     */
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();

        $this->SUT = new PositionClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testOpenPositions()
    {
        $this->createMockResponse(200, 'position/open_positions.json');
        $result = $this->SUT->openPositions();
        $this->assertInstanceOf(PositionsResponse::class, $result);
        $this->assertEquals('1', $result->getLastTransactionId());

        $positions = $result->getPositions();
        $this->assertCount(1, $positions);
        $this->assertEquals('EUR_USD', $positions[0]->getInstrument());
        $this->assertEquals(-3.0000, $positions[0]->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-3.0000, $positions[0]->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-0.2558, $positions[0]->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getUnrealizedProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getMarginUsed()->getAmount()->toFloat());

        $positionSideLong = $positions[0]->getLong();
        $this->assertEquals(0, $positionSideLong->getUnits()->toInt());
        $this->assertEquals(-3.0000, $positionSideLong->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-3.0000, $positionSideLong->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-0.2558, $positionSideLong->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideLong->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideLong->getUnrealizedProfitLoss()->getAmount()->toFloat());

        $positionSideShort = $positions[0]->getShort();
        $this->assertEquals(0, $positionSideShort->getUnits()->toInt());
        $this->assertEquals(0.0000, $positionSideShort->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getUnrealizedProfitLoss()->getAmount()->toFloat());
    }

    public function testPositions()
    {
        $this->createMockResponse(200, 'position/positions.json');
        $result = $this->SUT->positions();
        $this->assertInstanceOf(PositionsResponse::class, $result);
        $this->assertEquals('1', $result->getLastTransactionId());

        $positions = $result->getPositions();
        $this->assertCount(1, $positions);
        $this->assertEquals('EUR_USD', $positions[0]->getInstrument());
        $this->assertEquals(-3.0000, $positions[0]->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-3.0000, $positions[0]->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-0.2558, $positions[0]->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getUnrealizedProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positions[0]->getMarginUsed()->getAmount()->toFloat());

        $positionSideLong = $positions[0]->getLong();
        $this->assertEquals(0, $positionSideLong->getUnits()->toInt());
        $this->assertEquals(-3.0000, $positionSideLong->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-3.0000, $positionSideLong->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-0.2558, $positionSideLong->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideLong->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideLong->getUnrealizedProfitLoss()->getAmount()->toFloat());

        $positionSideShort = $positions[0]->getShort();
        $this->assertEquals(0, $positionSideShort->getUnits()->toInt());
        $this->assertEquals(0.0000, $positionSideShort->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getUnrealizedProfitLoss()->getAmount()->toFloat());
    }

    public function testPosition()
    {
        $this->createMockResponse(200, 'position/position.json');
        $result = $this->SUT->position('EUR_USD');
        $this->assertInstanceOf(PositionResponse::class, $result);
        $this->assertEquals('1', $result->getLastTransactionId());

        $position = $result->getPosition();
        $this->assertEquals('EUR_USD', $position->getInstrument());
        $this->assertEquals(-3.0000, $position->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-3.0000, $position->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-0.2558, $position->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getCommission()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getUnrealizedProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $position->getMarginUsed()->getAmount()->toFloat());

        $positionSideLong = $position->getLong();
        $this->assertEquals(0, $positionSideLong->getUnits()->toInt());
        $this->assertEquals(-3.0000, $positionSideLong->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-3.0000, $positionSideLong->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(-0.2558, $positionSideLong->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideLong->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideLong->getUnrealizedProfitLoss()->getAmount()->toFloat());

        $positionSideShort = $position->getShort();
        $this->assertEquals(0, $positionSideShort->getUnits()->toInt());
        $this->assertEquals(0.0000, $positionSideShort->getProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getResettableProfitLoss()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getFinancing()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getGuaranteedExecutionFees()->getAmount()->toFloat());
        $this->assertEquals(0.0000, $positionSideShort->getUnrealizedProfitLoss()->getAmount()->toFloat());
    }

    public function testClose()
    {
        $this->createMockResponse(200, 'position/close_position.json');
        $request = PositionRequestFactory::closePositionRequest('ALL');

        $result = $this->SUT->close('EUR_USD', $request);
        $this->assertInstanceOf(ClosePositionResponse::class, $result);

        $longOrderCreateTransaction = $result->getLongOrderCreateTransaction();
        $this->assertInstanceOf(MarketOrderTransaction::class, $longOrderCreateTransaction);
        $this->assertInstanceOf(MarketOrderPositionCloseout::class, $longOrderCreateTransaction->getLongPositionCloseout());
        $this->assertEquals('ALL', $longOrderCreateTransaction->getLongPositionCloseout()->getUnits());
        $this->assertEquals('POSITION_CLOSEOUT', $longOrderCreateTransaction->getReason());

        $longOrderFillTransaction = $result->getLongOrderFillTransaction();
        $this->assertInstanceOf(OrderFillTransaction::class, $longOrderFillTransaction);
    }
}
