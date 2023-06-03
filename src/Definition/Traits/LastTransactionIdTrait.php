<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use JMS\Serializer\Annotation as Serializer;

/**
 * Trait LastTransactionIdTrait.
 */
trait LastTransactionIdTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("lastTransactionID")
     *
     * @Serializer\Type("integer")
     */
    private $lastTransactionId;

    /**
     * @return int|null
     */
    public function getLastTransactionId(): ?int
    {
        return $this->lastTransactionId;
    }

    /**
     * @param int|null $lastTransactionId
     *
     * @return $this
     */
    public function setLastTransactionId(?int $lastTransactionId)
    {
        $this->lastTransactionId = $lastTransactionId;

        return $this;
    }
}
