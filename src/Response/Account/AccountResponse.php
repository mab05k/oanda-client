<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Account;

use Mab05k\OandaClient\Definition\Account\Account;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class AccountEnvelope.
 */
class AccountResponse
{
    use LastTransactionIdTrait;

    /**
     * @var Account|null
     *
     * @Serializer\SerializedName("account")
     */
    private $account;

    /**
     * @return Account|null
     */
    public function getAccount(): ?Account
    {
        return $this->account;
    }

    /**
     * @param Account|null $account
     *
     * @return AccountResponse
     */
    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }
}
