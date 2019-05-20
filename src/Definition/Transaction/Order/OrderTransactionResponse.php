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
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Mab05k\OandaClient\Definition\Traits\RelatedTransactionIdsTrait;
use Mab05k\OandaClient\Definition\Transaction\Transaction;

/**
 * Class OrderTransactionResponse.
 */
class OrderTransactionResponse
{
    use RelatedTransactionIdsTrait;
    use LastTransactionIdTrait;

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
     * @var Transaction|null
     *
     * @Serializer\SerializedName("orderReissueTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Transaction")
     */
    private $orderReissueTransaction;

    /**
     * @var Transaction|null
     *
     * @Serializer\SerializedName("orderReissueRejectTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Transaction")
     */
    private $orderReissueRejectTransaction;

    /**
     * @var OrderCancelTransaction|null
     *
     * @Serializer\SerializedName("replacingOrderCancelTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderCancelTransaction")
     */
    private $replacingOrderCancelTransaction;

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

    /**
     * @return Transaction|null
     */
    public function getOrderReissueTransaction(): ?Transaction
    {
        return $this->orderReissueTransaction;
    }

    /**
     * @param Transaction|null $orderReissueTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderReissueTransaction(?Transaction $orderReissueTransaction): self
    {
        $this->orderReissueTransaction = $orderReissueTransaction;

        return $this;
    }

    /**
     * @return Transaction|null
     */
    public function getOrderReissueRejectTransaction(): ?Transaction
    {
        return $this->orderReissueRejectTransaction;
    }

    /**
     * @param Transaction|null $orderReissueRejectTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setOrderReissueRejectTransaction(?Transaction $orderReissueRejectTransaction): self
    {
        $this->orderReissueRejectTransaction = $orderReissueRejectTransaction;

        return $this;
    }

    /**
     * @return OrderCancelTransaction|null
     */
    public function getReplacingOrderCancelTransaction(): ?OrderCancelTransaction
    {
        return $this->replacingOrderCancelTransaction;
    }

    /**
     * @param OrderCancelTransaction|null $replacingOrderCancelTransaction
     *
     * @return OrderTransactionResponse
     */
    public function setReplacingOrderCancelTransaction(?OrderCancelTransaction $replacingOrderCancelTransaction): self
    {
        $this->replacingOrderCancelTransaction = $replacingOrderCancelTransaction;

        return $this;
    }
}
