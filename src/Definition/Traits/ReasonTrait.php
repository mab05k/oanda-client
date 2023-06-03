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
 * Trait ReasonTrait.
 */
trait ReasonTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("reason")
     *
     * @Serializer\Type("string")
     */
    private $reason;

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param string|null $reason
     *
     * @return $this
     */
    public function setReason(?string $reason)
    {
        $this->reason = $reason;

        return $this;
    }
}
