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
 * Trait AccountOpenStatusTrait.
 */
trait AccountOpenStatusTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("openTradeCount")
     */
    private $openTradeCount;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("openPositionCount")
     */
    private $openPositionCount;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("pendingOrderCount")
     */
    private $pendingOrderCount;

    /**
     * @return int|null
     */
    public function getOpenTradeCount(): ?int
    {
        return $this->openTradeCount;
    }

    /**
     * @param int|null $openTradeCount
     *
     * @return $this
     */
    public function setOpenTradeCount(?int $openTradeCount)
    {
        $this->openTradeCount = $openTradeCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOpenPositionCount(): ?int
    {
        return $this->openPositionCount;
    }

    /**
     * @param int|null $openPositionCount
     *
     * @return $this
     */
    public function setOpenPositionCount(?int $openPositionCount)
    {
        $this->openPositionCount = $openPositionCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPendingOrderCount(): ?int
    {
        return $this->pendingOrderCount;
    }

    /**
     * @param int|null $pendingOrderCount
     *
     * @return $this
     */
    public function setPendingOrderCount(?int $pendingOrderCount)
    {
        $this->pendingOrderCount = $pendingOrderCount;

        return $this;
    }
}
