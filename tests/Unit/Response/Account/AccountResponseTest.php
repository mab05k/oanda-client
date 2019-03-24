<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Response\Account;

use Mab05k\OandaClient\Definition\Account\Account;
use Mab05k\OandaClient\Response\Account\AccountResponse;
use PHPUnit\Framework\TestCase;

class AccountResponseTest extends TestCase
{
    /**
     * @var AccountResponse
     */
    private $SUT;

    public function setUp(): void
    {
        $this->SUT = new AccountResponse();
    }

    public function testGettersSetters()
    {
        $account = new Account();
        $this->assertInstanceOf(AccountResponse::class, $this->SUT->setAccount($account));
        $this->assertInstanceOf(Account::class, $this->SUT->getAccount());
    }
}
