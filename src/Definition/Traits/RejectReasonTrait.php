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
 * Trait RejectReasonTrait.
 */
trait RejectReasonTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("rejectReason")
     */
    private $rejectReason;

    /**
     * @return string|null
     */
    public function getRejectReason(): ?string
    {
        return $this->rejectReason;
    }

    /**
     * @param string|null $rejectReason
     *
     * @return $this
     */
    public function setRejectReason(?string $rejectReason): self
    {
        $this->rejectReason = $rejectReason;

        return $this;
    }
}
