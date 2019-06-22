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
 * Trait OrderIdTrait.
 */
trait TransactionOrderIdTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("orderID")
     */
    private $orderId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("clientOrderID")
     */
    private $clientOrderId;

    /**
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param string|null $orderId
     *
     * @return $this
     */
    public function setOrderId(?string $orderId)
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
