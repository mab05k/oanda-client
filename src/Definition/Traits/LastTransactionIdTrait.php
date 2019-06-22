<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait LastTransactionIdTrait.
 */
trait LastTransactionIdTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("lastTransactionID")
     */
    private $lastTransactionId;

    /**
     * @return string|null
     */
    public function getLastTransactionId(): ?string
    {
        return $this->lastTransactionId;
    }

    /**
     * @param string|null $lastTransactionId
     *
     * @return $this
     */
    public function setLastTransactionId(?string $lastTransactionId)
    {
        $this->lastTransactionId = $lastTransactionId;

        return $this;
    }
}
