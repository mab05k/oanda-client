<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Account;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Configuration.
 */
class Configuration
{
    /**
     * @var ClientConfigureTransaction|null
     *
     * @Serializer\SerializedName("clientConfigureTransaction")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Account\ClientConfigureTransaction")
     */
    private $clientConfigureTransaction;

    /**
     * @return ClientConfigureTransaction|null
     */
    public function getClientConfigureTransaction(): ?ClientConfigureTransaction
    {
        return $this->clientConfigureTransaction;
    }

    /**
     * @param ClientConfigureTransaction|null $clientConfigureTransaction
     *
     * @return Configuration
     */
    public function setClientConfigureTransaction(?ClientConfigureTransaction $clientConfigureTransaction): self
    {
        $this->clientConfigureTransaction = $clientConfigureTransaction;

        return $this;
    }
}
