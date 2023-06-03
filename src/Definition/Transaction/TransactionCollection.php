<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;

/**
 * Class TransactionCollection.
 */
class TransactionCollection
{
    use LastTransactionIdTrait;

    /**
     * @var array|null
     *
     * @Serializer\SerializedName("transactions")
     *
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Transaction\Transaction>")
     */
    private $transactions;

    /**
     * @return array|null
     */
    public function getTransactions(): ?array
    {
        return $this->transactions;
    }

    /**
     * @param array|null $transactions
     *
     * @return TransactionCollection
     */
    public function setTransactions(?array $transactions): self
    {
        $this->transactions = $transactions;

        return $this;
    }
}
