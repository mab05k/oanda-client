<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Order;

use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\TransactionOrderIdTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class OrderClientExtensionsModifyTransaction.
 */
class OrderClientExtensionsModifyTransaction
{
    use OrderTransactionTrait;
    use TypeTrait;
    use TransactionOrderIdTrait;

    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("clientExtensionsModify")
     */
    private $clientExtensionsModify;

    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("tradeClientExtensionsModify")
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
