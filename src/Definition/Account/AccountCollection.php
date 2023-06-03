<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AccountCollection.
 */
class AccountCollection
{
    /**
     * @var array|AccountProperty[]
     *
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Account\AccountProperty>")
     *
     * @Serializer\SerializedName("accounts")
     */
    private $accounts;

    /**
     * @return array|AccountProperty[]
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * @param array $accounts
     *
     * @return AccountCollection
     */
    public function setAccounts(array $accounts): self
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * @param AccountProperty $accountProperty
     *
     * @return AccountCollection
     */
    public function addAccount(AccountProperty $accountProperty): self
    {
        $this->accounts[] = $accountProperty;

        return $this;
    }
}
