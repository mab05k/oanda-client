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
 * Trait PartialFillTrait.
 */
trait PartialFillTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("partialFill")
     */
    private $partialFill;

    /**
     * @return string|null
     */
    public function getPartialFill(): ?string
    {
        return $this->partialFill;
    }

    /**
     * @param string|null $partialFill
     *
     * @return $this
     */
    public function setPartialFill(?string $partialFill)
    {
        $this->partialFill = $partialFill;

        return $this;
    }
}
