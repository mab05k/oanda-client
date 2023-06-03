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
 * Trait RelatedTransactionIdsTrait.
 */
trait RelatedTransactionIdsTrait
{
    /**
     * @var array|null
     *
     * @Serializer\SerializedName("relatedTransactionIDs")
     *
     * @Serializer\Type("array<string>")
     */
    private $relatedTransactionIds;

    /**
     * @return array|null
     */
    public function getRelatedTransactionIds(): ?array
    {
        return $this->relatedTransactionIds;
    }

    /**
     * @param array|null $relatedTransactionIds
     *
     * @return RelatedTransactionIdsTrait
     */
    public function setRelatedTransactionIds(?array $relatedTransactionIds): RelatedTransactionIdsTrait
    {
        $this->relatedTransactionIds = $relatedTransactionIds;

        return $this;
    }
}
