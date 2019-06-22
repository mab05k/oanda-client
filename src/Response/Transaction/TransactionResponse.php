<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Transaction;

use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Mab05k\OandaClient\Definition\Transaction\Transaction;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class TransactionResponse.
 */
class TransactionResponse
{
    use LastTransactionIdTrait;

    /**
     * @var Transaction|null
     *
     * @Serializer\SerializedName("transaction")
     */
    private $transaction;

    /**
     * @return Transaction|null
     */
    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    /**
     * @param Transaction|null $transaction
     *
     * @return TransactionResponse
     */
    public function setTransaction(?Transaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
