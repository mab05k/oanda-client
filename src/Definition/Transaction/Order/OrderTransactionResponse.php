<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrderTransactionResponse.
 */
class OrderTransactionResponse
{
    /**
     * @var array|null
     *
     * @Serializer\SerializedName("relatedTransactionIDs")
     * @Serializer\Type("array<string>")
     */
    private $relatedTransactionIds;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("lastTransactionID")
     * @Serializer\Type("string")
     */
    private $lastTransactionId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("errorMessage")
     * @Serializer\Type("string")
     */
    private $errorMessage;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("errorCode")
     * @Serializer\Type("string")
     */
    private $errorCode;

    /**
     * @var OrderFillTransaction|null
     *
     * @Serializer\SerializedName("orderFillTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderFillTransaction")
     */
    private $orderFillTransaction;

    /**
     * @var OrderCreateTransaction|null
     *
     * @Serializer\SerializedName("orderCreateTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderCreateTransaction")
     */
    private $orderCreateTransaction;

    /**
     * @var OrderRejectTransaction|null
     *
     * @Serializer\SerializedName("orderRejectTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderRejectTransaction")
     */
    private $orderRejectTransaction;

    /**
     * @var OrderCancelTransaction|null
     *
     * @Serializer\SerializedName("orderCancelTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderCancelTransaction")
     */
    private $orderCancelTransaction;

    /**
     * @var OrderCancelRejectTransaction|null
     *
     * @Serializer\SerializedName("orderCancelRejectTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderCancelRejectTransaction")
     */
    private $orderCancelRejectTransaction;

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
     * @return OrderTransactionResponse
     */
    public function setRelatedTransactionIds(?array $relatedTransactionIds): self
    {
        $this->relatedTransactionIds = $relatedTransactionIds;

        return $this;
    }

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
     * @return OrderTransactionResponse
     */
    public function setLastTransactionId(?string $lastTransactionId): self
    {
        $this->lastTransactionId = $lastTransactionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @param string|null $errorMessage
     *
     * @return OrderTransactionResponse
     */
    public function setErrorMessage(?string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * @param string|null $errorCode
     *
     * @return OrderTransactionResponse
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @return OrderFillTransaction|null
     */
    public function getOrderFillTransaction(): ?OrderFillTransaction
    {
        return $this->orderFillTransaction;
    }

    /**
     * @param OrderFillTransaction|null $orderFillTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderFillTransaction(?OrderFillTransaction $orderFillTransaction): self
    {
        $this->orderFillTransaction = $orderFillTransaction;

        return $this;
    }

    /**
     * @return OrderCreateTransaction|null
     */
    public function getOrderCreateTransaction(): ?OrderCreateTransaction
    {
        return $this->orderCreateTransaction;
    }

    /**
     * @param OrderCreateTransaction|null $orderCreateTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderCreateTransaction(?OrderCreateTransaction $orderCreateTransaction): self
    {
        $this->orderCreateTransaction = $orderCreateTransaction;

        return $this;
    }

    /**
     * @return OrderRejectTransaction|null
     */
    public function getOrderRejectTransaction(): ?OrderRejectTransaction
    {
        return $this->orderRejectTransaction;
    }

    /**
     * @param OrderRejectTransaction|null $orderRejectTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderRejectTransaction(?OrderRejectTransaction $orderRejectTransaction): self
    {
        $this->orderRejectTransaction = $orderRejectTransaction;

        return $this;
    }

    /**
     * @return OrderCancelTransaction|null
     */
    public function getOrderCancelTransaction(): ?OrderCancelTransaction
    {
        return $this->orderCancelTransaction;
    }

    /**
     * @param OrderCancelTransaction|null $orderCancelTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderCancelTransaction(?OrderCancelTransaction $orderCancelTransaction): self
    {
        $this->orderCancelTransaction = $orderCancelTransaction;

        return $this;
    }

    /**
     * @return OrderCancelRejectTransaction|null
     */
    public function getOrderCancelRejectTransaction(): ?OrderCancelRejectTransaction
    {
        return $this->orderCancelRejectTransaction;
    }

    /**
     * @param OrderCancelRejectTransaction|null $orderCancelRejectTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderCancelRejectTransaction(?OrderCancelRejectTransaction $orderCancelRejectTransaction): self
    {
        $this->orderCancelRejectTransaction = $orderCancelRejectTransaction;

        return $this;
    }
}
