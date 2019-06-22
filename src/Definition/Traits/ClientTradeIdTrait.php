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
 * Trait ClientIdTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait ClientTradeIdTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("clientTradeID")
     */
    protected $clientTradeId;

    /**
     * @return string|null
     */
    public function getClientTradeId(): ?string
    {
        return $this->clientTradeId;
    }

    /**
     * @param string|null $clientTradeId
     *
     * @return $this
     */
    public function setClientTradeId(?string $clientTradeId)
    {
        $this->clientTradeId = $clientTradeId;

        return $this;
    }
}
