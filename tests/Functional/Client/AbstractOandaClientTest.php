<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Functional\Client;

use Mab05k\OandaClient\Account\Account;
use Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection\Configuration;
use Mab05k\OandaClient\Client\AbstractOandaClient;
use Mab05k\OandaClient\Tests\Fixtures\DummyClient;
use Psr\Http\Message\RequestInterface;

class AbstractOandaClientTest extends AbstractClientTest
{
    /**
     * @var AbstractOandaClient
     */
    private $SUT;

    protected function setUp(): void
    {
        parent::setUp();

        $this->SUT = new DummyClient(
            $this->accountDiscriminator,
            $this->mockClient,
            $this->guzzleMessageFactory,
            $this->guzzleUriFactory,
            $this->serializer,
            $this->logger
        );
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(AbstractOandaClient::class, $this->SUT);
    }

    public function testCreateRequest()
    {
        $request = $this->SUT->createRequest(
            'GET',
            '/accounts/%s'.sprintf('/orders/%s', '1000')
        );

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertEquals('/accounts/000-000-0000000-000/orders/1000', $request->getUri()->getPath());
        $this->assertTrue($request->hasHeader('Authorization'));
        $this->assertEquals(
            sprintf('Bearer %s', $this->accountsArray[0][Configuration::ACCOUNT_SECRET]),
            $request->getHeader('Authorization')[0]
        );
    }

    public function testSetAccount()
    {
        $this->assertNull($this->SUT->setAccount(new Account('name', 'id', 'secret')));
        $this->assertNull($this->SUT->setAccount($this->accountsArray[0][Configuration::ACCOUNT_NAME]));
        $this->assertNull($this->SUT->setAccount($this->accountsArray[0][Configuration::ACCOUNT_ID]));

        $this->expectException('Mab05k\OandaClient\Exception\ConfigurationException');
        $this->SUT->setAccount('some_account');
    }

    public function testGetAccount()
    {
        $this->assertEquals($this->accountsArray[0][Configuration::ACCOUNT_NAME], $this->SUT->getAccount()->getName());
        $this->assertEquals($this->accountsArray[0][Configuration::ACCOUNT_ID], $this->SUT->getAccount()->getId());
        $this->assertEquals($this->accountsArray[0][Configuration::ACCOUNT_SECRET], $this->SUT->getAccount()->getSecret());

        $this->SUT->setAccount($this->accountsArray[1][Configuration::ACCOUNT_NAME]);
        $this->assertEquals($this->accountsArray[1][Configuration::ACCOUNT_NAME], $this->SUT->getAccount()->getName());
        $this->assertEquals($this->accountsArray[1][Configuration::ACCOUNT_ID], $this->SUT->getAccount()->getId());
        $this->assertEquals($this->accountsArray[1][Configuration::ACCOUNT_SECRET], $this->SUT->getAccount()->getSecret());
    }
}
