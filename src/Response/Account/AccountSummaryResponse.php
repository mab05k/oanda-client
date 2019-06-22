<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Account;

use Mab05k\OandaClient\Definition\Account\AccountSummary;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class AccountSummaryEnvelope.
 */
class AccountSummaryResponse
{
    use LastTransactionIdTrait;

    /**
     * @var AccountSummary|null
     *
     * @Serializer\SerializedName("account")
     */
    private $account;

    /**
     * @return AccountSummary|null
     */
    public function getAccount(): ?AccountSummary
    {
        return $this->account;
    }

    /**
     * @param AccountSummary|null $account
     *
     * @return AccountSummaryResponse
     */
    public function setAccount(?AccountSummary $account): self
    {
        $this->account = $account;

        return $this;
    }
}
