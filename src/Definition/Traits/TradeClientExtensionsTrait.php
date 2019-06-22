<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait TradeClientExtensionsTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TradeClientExtensionsTrait
{
    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("tradeClientExtensions")
     */
    private $tradeClientExtensions;

    /**
     * @return ClientExtension|null
     */
    public function getTradeClientExtensions()
    {
        return $this->tradeClientExtensions;
    }

    /**
     * @param ClientExtension $tradeClientExtensions
     *
     * @return $this
     */
    public function setTradeClientExtensions(?ClientExtension $tradeClientExtensions)
    {
        $this->tradeClientExtensions = $tradeClientExtensions;

        return $this;
    }
}
