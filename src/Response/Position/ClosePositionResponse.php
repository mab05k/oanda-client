<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Position;

use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Mab05k\OandaClient\Definition\Traits\RelatedTransactionIdsTrait;
use Mab05k\OandaClient\Definition\Transaction\Order\MarketOrderTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderCancelTransaction;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderFillTransaction;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ClosePositionResponse.
 */
class ClosePositionResponse
{
    use RelatedTransactionIdsTrait;
    use LastTransactionIdTrait;

    /**
     * @var MarketOrderTransaction|null
     *
     * @Serializer\SerializedName("longOrderCreateTransaction")
     */
    private $longOrderCreateTransaction;

    /**
     * @var OrderFillTransaction|null
     *
     * @Serializer\SerializedName("longOrderFillTransaction")
     */
    private $longOrderFillTransaction;

    /**
     * @var OrderCancelTransaction|null
     *
     * @Serializer\SerializedName("longOrderCancelTransaction")
     */
    private $longOrderCancelTransaction;

    /**
     * @var MarketOrderTransaction|null
     *
     * @Serializer\SerializedName("shortOrderCreateTransaction")
     */
    private $shortOrderCreateTransaction;

    /**
     * @var OrderFillTransaction|null
     *
     * @Serializer\SerializedName("shortOrderFillTransaction")
     */
    private $shortOrderFillTransaction;

    /**
     * @var OrderCancelTransaction|null
     *
     * @Serializer\SerializedName("shortOrderCancelTransaction")
     */
    private $shortOrderCancelTransaction;

    /**
     * @return MarketOrderTransaction|null
     */
    public function getLongOrderCreateTransaction(): ?MarketOrderTransaction
    {
        return $this->longOrderCreateTransaction;
    }

    /**
     * @param MarketOrderTransaction|null $longOrderCreateTransaction
     *
     * @return ClosePositionResponse
     */
    public function setLongOrderCreateTransaction(?MarketOrderTransaction $longOrderCreateTransaction): self
    {
        $this->longOrderCreateTransaction = $longOrderCreateTransaction;

        return $this;
    }

    /**
     * @return OrderFillTransaction|null
     */
    public function getLongOrderFillTransaction(): ?OrderFillTransaction
    {
        return $this->longOrderFillTransaction;
    }

    /**
     * @param OrderFillTransaction|null $longOrderFillTransaction
     *
     * @return ClosePositionResponse
     */
    public function setLongOrderFillTransaction(?OrderFillTransaction $longOrderFillTransaction): self
    {
        $this->longOrderFillTransaction = $longOrderFillTransaction;

        return $this;
    }

    /**
     * @return OrderCancelTransaction|null
     */
    public function getLongOrderCancelTransaction(): ?OrderCancelTransaction
    {
        return $this->longOrderCancelTransaction;
    }

    /**
     * @param OrderCancelTransaction|null $longOrderCancelTransaction
     *
     * @return ClosePositionResponse
     */
    public function setLongOrderCancelTransaction(?OrderCancelTransaction $longOrderCancelTransaction): self
    {
        $this->longOrderCancelTransaction = $longOrderCancelTransaction;

        return $this;
    }

    /**
     * @return MarketOrderTransaction|null
     */
    public function getShortOrderCreateTransaction(): ?MarketOrderTransaction
    {
        return $this->shortOrderCreateTransaction;
    }

    /**
     * @param MarketOrderTransaction|null $shortOrderCreateTransaction
     *
     * @return ClosePositionResponse
     */
    public function setShortOrderCreateTransaction(?MarketOrderTransaction $shortOrderCreateTransaction): self
    {
        $this->shortOrderCreateTransaction = $shortOrderCreateTransaction;

        return $this;
    }

    /**
     * @return OrderFillTransaction|null
     */
    public function getShortOrderFillTransaction(): ?OrderFillTransaction
    {
        return $this->shortOrderFillTransaction;
    }

    /**
     * @param OrderFillTransaction|null $shortOrderFillTransaction
     *
     * @return ClosePositionResponse
     */
    public function setShortOrderFillTransaction(?OrderFillTransaction $shortOrderFillTransaction): self
    {
        $this->shortOrderFillTransaction = $shortOrderFillTransaction;

        return $this;
    }

    /**
     * @return OrderCancelTransaction|null
     */
    public function getShortOrderCancelTransaction(): ?OrderCancelTransaction
    {
        return $this->shortOrderCancelTransaction;
    }

    /**
     * @param OrderCancelTransaction|null $shortOrderCancelTransaction
     *
     * @return ClosePositionResponse
     */
    public function setShortOrderCancelTransaction(?OrderCancelTransaction $shortOrderCancelTransaction): self
    {
        $this->shortOrderCancelTransaction = $shortOrderCancelTransaction;

        return $this;
    }
}
