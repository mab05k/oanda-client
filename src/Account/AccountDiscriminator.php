<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Account;

use Mab05k\OandaClient\Bridge\Symfony\Bundle\DependencyInjection\Configuration;
use Mab05k\OandaClient\Exception\ConfigurationException;

/**
 * Class AccountDiscriminator.
 */
class AccountDiscriminator
{
    /**
     * @var Account[]
     */
    private $accounts;

    /**
     * AccountDiscriminator constructor.
     *
     * @param Account[] $accounts
     */
    public function __construct(array $accounts)
    {
        $accountObjects = [];
        foreach ($accounts as $account) {
            $accountObjects[] = new Account(
                $account[Configuration::ACCOUNT_NAME],
                $account[Configuration::ACCOUNT_ID],
                $account[Configuration::ACCOUNT_SECRET]
            );
        }
        $this->accounts = $accountObjects;
    }

    /**
     * @return Account[]
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * @param string $accountIdentifier
     *
     * @throws ConfigurationException
     *
     * @return Account
     */
    public function getAccount(string $accountIdentifier): Account
    {
        foreach ($this->accounts as $account) {
            if (
                $account->getName() === $accountIdentifier
                || $account->getId() === $accountIdentifier
            ) {
                return $account;
            }
        }

        throw new ConfigurationException(
            sprintf('No Account found for Account %s', $accountIdentifier),
            1002
        );
    }

    /**
     * @param string $accountIdentifier
     *
     * @throws ConfigurationException
     *
     * @return string
     */
    public function getAccountSecret(string $accountIdentifier): string
    {
        return $this->getAccount($accountIdentifier)->getSecret();
    }

    /**
     * @throws ConfigurationException
     *
     * Always return the first account in the array. The first configured account.
     *
     * @return Account
     */
    public function getDefaultAccount(): Account
    {
        foreach ($this->accounts as $account) {
            return $account;
        }

        throw new ConfigurationException('You must have at least 1 account configured', 1001);
    }

    /**
     * @throws ConfigurationException
     *
     * @return string
     */
    public function getDefaultAccountSecret(): string
    {
        return $this->getDefaultAccount()->getSecret();
    }
}
