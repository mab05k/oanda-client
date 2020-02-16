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
use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;

/**
 * Trait ClientExtensionsTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait ClientExtensionsTrait
{
    /**
     * @var \Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension|null
     *
     * @Serializer\SerializedName("clientExtensions")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension")
     */
    protected $clientExtensions;

    /**
     * @return \Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension|null
     */
    public function getClientExtensions()
    {
        return $this->clientExtensions;
    }

    /**
     * @param \Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension $clientExtensions
     *
     * @return $this
     */
    public function setClientExtensions(?ClientExtension $clientExtensions)
    {
        $this->clientExtensions = $clientExtensions;

        return $this;
    }
}
