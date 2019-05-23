<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Order;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Mab05k\OandaClient\Definition\Traits\RelatedTransactionIdsTrait;
use Mab05k\OandaClient\Definition\Transaction\Order\OrderClientExtensionsModifyTransaction;

/**
 * Class OrderClientExtensionsResponse.
 */
class OrderClientExtensionsResponse
{
    use LastTransactionIdTrait;
    use RelatedTransactionIdsTrait;

    /**
     * @var OrderClientExtensionsModifyTransaction|null
     *
     * @Serializer\SerializedName("orderClientExtensionsModifyTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Order\OrderClientExtensionsModifyTransaction")
     */
    private $orderClientExtensionsModifyTransaction;

    /**
     * @return OrderClientExtensionsModifyTransaction|null
     */
    public function getOrderClientExtensionsModifyTransaction(): ?OrderClientExtensionsModifyTransaction
    {
        return $this->orderClientExtensionsModifyTransaction;
    }

    /**
     * @param OrderClientExtensionsModifyTransaction|null $orderClientExtensionsModifyTransaction
     *
     * @return OrderClientExtensionsResponse
     */
    public function setOrderClientExtensionsModifyTransaction(?OrderClientExtensionsModifyTransaction $orderClientExtensionsModifyTransaction): self
    {
        $this->orderClientExtensionsModifyTransaction = $orderClientExtensionsModifyTransaction;

        return $this;
    }
}
