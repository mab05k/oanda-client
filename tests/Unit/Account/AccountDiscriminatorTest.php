<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Account;

use Mab05k\OandaClient\Account\Account;
use Mab05k\OandaClient\Account\AccountDiscriminator;
use Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection\Configuration;
use Phake;
use PHPUnit\Framework\TestCase;

class AccountDiscriminatorTest extends TestCase
{
    /**
     * @var AccountDiscriminator
     */
    private $SUT;

    private $accounts = [
        [
            Configuration::ACCOUNT_NAME => 'account_1',
            Configuration::ACCOUNT_ID => 'id_1',
            Configuration::ACCOUNT_SECRET => 'secret_1',
        ],
        [
            Configuration::ACCOUNT_NAME => 'account_2',
            Configuration::ACCOUNT_ID => 'id_2',
            Configuration::ACCOUNT_SECRET => 'secret_2',
        ],
    ];

    public function setUp()
    {
        Phake::initAnnotations($this);

        $this->SUT = new AccountDiscriminator($this->accounts);
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(AccountDiscriminator::class, $this->SUT);
    }

    /**
     * @param array $accountConfig
     *
     * @throws \Mab05k\OandaClient\Exception\ConfigurationException
     *
     * @dataProvider accountDataProvider
     */
    public function testGetAccount(array $accountConfig)
    {
        $account = $this->SUT->getAccount($accountConfig[Configuration::ACCOUNT_NAME]);
        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_NAME], $account->getName());
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_ID], $account->getId());
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_SECRET], $account->getSecret());
    }

    /**
     * @param array $accountConfig
     *
     * @throws \Mab05k\OandaClient\Exception\ConfigurationException
     *
     * @dataProvider accountDataProvider
     */
    public function testGetAccountWithAccountId(array $accountConfig)
    {
        $account = $this->SUT->getAccount($accountConfig[Configuration::ACCOUNT_ID]);
        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_NAME], $account->getName());
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_ID], $account->getId());
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_SECRET], $account->getSecret());
    }

    public function testGetDefaultAccount()
    {
        $account = $this->SUT->getDefaultAccount();
        $this->assertInstanceOf(Account::class, $account);
        $this->assertEquals($this->accounts[0][Configuration::ACCOUNT_NAME], $account->getName());
        $this->assertEquals($this->accounts[0][Configuration::ACCOUNT_ID], $account->getId());
        $this->assertEquals($this->accounts[0][Configuration::ACCOUNT_SECRET], $account->getSecret());
    }

    public function testGetDefaultAccountSecret()
    {
        $secret = $this->SUT->getDefaultAccountSecret();
        $this->assertEquals($this->accounts[0][Configuration::ACCOUNT_SECRET], $secret);
    }

    /**
     * @param array $accountConfig
     *
     * @throws \Mab05k\OandaClient\Exception\ConfigurationException
     *
     * @dataProvider accountDataProvider
     */
    public function testGetAccountSecret(array $accountConfig)
    {
        $secret = $this->SUT->getAccountSecret($accountConfig[Configuration::ACCOUNT_NAME]);
        $this->assertEquals($accountConfig[Configuration::ACCOUNT_SECRET], $secret);
    }

    /**
     * @return array
     */
    public function accountDataProvider(): array
    {
        return [$this->accounts];
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\ConfigurationException
     */
    public function testNoAccountsConfiguredAccount()
    {
        $this->expectException(\Mab05k\OandaClient\Exception\ConfigurationException::class);

        $this->SUT->getAccount('someName');
    }

    /**
     * @throws \Mab05k\OandaClient\Exception\ConfigurationException
     */
    public function testNoAccountsConfiguredDefaultAccount()
    {
        $this->expectException(\Mab05k\OandaClient\Exception\ConfigurationException::class);

        $SUT = new AccountDiscriminator([]);
        $SUT->getDefaultAccount();
    }
}
