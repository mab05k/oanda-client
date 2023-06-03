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
 * Trait TradeStatusIdTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TradeStatusIdTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("tradeOpenedID")
     *
     * @Serializer\Type("integer")
     */
    private $tradeOpenedId;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("tradeReducedID")
     *
     * @Serializer\Type("integer")
     */
    private $tradeReducedId;

    /**
     * @var array|null
     *
     * @Serializer\SerializedName("tradeClosedIDs")
     *
     * @Serializer\Type("array<string>")
     */
    private $tradeClosedIds;

    /**
     * @return int|null
     */
    public function getTradeOpenedId(): ?int
    {
        return $this->tradeOpenedId;
    }

    /**
     * @param int|null $tradeOpenedId
     *
     * @return $this
     */
    public function setTradeOpenedId(?int $tradeOpenedId)
    {
        $this->tradeOpenedId = $tradeOpenedId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTradeReducedId(): ?int
    {
        return $this->tradeReducedId;
    }

    /**
     * @param int|null $tradeReducedId
     *
     * @return $this
     */
    public function setTradeReducedId(?int $tradeReducedId)
    {
        $this->tradeReducedId = $tradeReducedId;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTradeClosedIds(): ?array
    {
        return $this->tradeClosedIds;
    }

    /**
     * @param array|null $tradeClosedIds
     *
     * @return $this
     */
    public function setTradeClosedIds(?array $tradeClosedIds)
    {
        $this->tradeClosedIds = $tradeClosedIds;

        return $this;
    }
}
