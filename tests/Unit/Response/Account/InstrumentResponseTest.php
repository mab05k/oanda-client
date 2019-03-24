<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Response\Account;

use Mab05k\OandaClient\Definition\Account\Instrument;
use Mab05k\OandaClient\Response\Account\InstrumentResponse;
use PHPUnit\Framework\TestCase;

class InstrumentResponseTest extends TestCase
{
    /**
     * @var InstrumentResponse
     */
    private $SUT;

    public function setUp(): void
    {
        $this->SUT = new InstrumentResponse();
    }

    public function testGettersSetters()
    {
        $instruments = [new Instrument()];
        $this->assertInstanceOf(InstrumentResponse::class, $this->SUT->setInstruments($instruments));
        $this->assertCount(1, $this->SUT->getInstruments());
        $this->assertInstanceOf(Instrument::class, $this->SUT->getInstruments()[0]);
    }
}
