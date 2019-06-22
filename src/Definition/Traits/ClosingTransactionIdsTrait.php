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
 * Trait ClosingTransactionIdsTrait.
 */
trait ClosingTransactionIdsTrait
{
    /**
     * @var array
     *
     * @Serializer\SerializedName("closingTransactionIDs")
     */
    private $closingTransactionIDs = [];

    /**
     * @return array
     */
    public function getClosingTransactionIDs(): array
    {
        return $this->closingTransactionIDs;
    }

    /**
     * @param array $closingTransactionIDs
     *
     * @return $this
     */
    public function setClosingTransactionIDs(array $closingTransactionIDs)
    {
        $this->closingTransactionIDs = $closingTransactionIDs;

        return $this;
    }
}
