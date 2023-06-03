<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Response\Account;

use Mab05k\OandaClient\Definition\Account\AccountSummary;
use Mab05k\OandaClient\Response\Account\AccountSummaryResponse;
use PHPUnit\Framework\TestCase;

class AccountSummaryResponseTest extends TestCase
{
    /**
     * @var AccountSummaryResponse
     */
    private $SUT;

    protected function setUp(): void
    {
        $this->SUT = new AccountSummaryResponse();
    }

    public function testGettersSetters()
    {
        $account = new AccountSummary();
        $this->assertInstanceOf(AccountSummaryResponse::class, $this->SUT->setAccount($account));
        $this->assertInstanceOf(AccountSummary::class, $this->SUT->getAccount());
    }
}
