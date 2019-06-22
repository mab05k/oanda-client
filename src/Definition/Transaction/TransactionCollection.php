<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction;

use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class TransactionCollection.
 */
class TransactionCollection
{
    use LastTransactionIdTrait;

    /**
     * @var null
     *
     * @Serializer\SerializedName("transactions")
     */
    private $transactions;

    public function getTransactions(): ?array
    {
        return $this->transactions;
    }

    /**
     * @param null $transactions
     *
     * @return TransactionCollection
     */
    public function setTransactions(?array $transactions): self
    {
        $this->transactions = $transactions;

        return $this;
    }
}
