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
 * Trait OrderIdTrait.
 */
trait TransactionOrderIdTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("orderID")
     * @Serializer\Type("integer")
     */
    private $orderId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("clientOrderID")
     * @Serializer\Type("string")
     */
    private $clientOrderId;

    /**
     * @return int|null
     */
    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    /**
     * @param int|null $orderId
     *
     * @return $this
     */
    public function setOrderId(?int $orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientOrderId(): ?string
    {
        return $this->clientOrderId;
    }

    /**
     * @param string|null $clientOrderId
     *
     * @return $this
     */
    public function setClientOrderId(?string $clientOrderId)
    {
        $this->clientOrderId = $clientOrderId;

        return $this;
    }
}
