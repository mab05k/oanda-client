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
use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\TransactionOrderIdTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;

/**
 * Class OrderClientExtensionsModifyTransaction.
 */
class OrderClientExtensionsModifyTransaction
{
    use OrderTransactionTrait;
    use TransactionOrderIdTrait;
    use TypeTrait;

    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("clientExtensionsModify")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension")
     */
    private $clientExtensionsModify;

    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("tradeClientExtensionsModify")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension")
     */
    private $tradeClientExtensionsModify;

    /**
     * @return ClientExtension|null
     */
    public function getClientExtensionsModify(): ?ClientExtension
    {
        return $this->clientExtensionsModify;
    }

    /**
     * @param ClientExtension|null $clientExtensionsModify
     *
     * @return OrderClientExtensionsModifyTransaction
     */
    public function setClientExtensionsModify(?ClientExtension $clientExtensionsModify): self
    {
        $this->clientExtensionsModify = $clientExtensionsModify;

        return $this;
    }

    /**
     * @return ClientExtension|null
     */
    public function getTradeClientExtensionsModify(): ?ClientExtension
    {
        return $this->tradeClientExtensionsModify;
    }

    /**
     * @param ClientExtension|null $tradeClientExtensionsModify
     *
     * @return OrderClientExtensionsModifyTransaction
     */
    public function setTradeClientExtensionsModify(?ClientExtension $tradeClientExtensionsModify): self
    {
        $this->tradeClientExtensionsModify = $tradeClientExtensionsModify;

        return $this;
    }
}
