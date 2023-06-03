<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Account;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Account\AccountChanges;
use Mab05k\OandaClient\Definition\Account\AccountState;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;

/**
 * Class AccountChangesResponse.
 */
class AccountChangesResponse
{
    use LastTransactionIdTrait;

    /**
     * @var AccountChanges|null
     *
     * @Serializer\SerializedName("changes")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Account\AccountChanges")
     */
    private $changes;

    /**
     * @var AccountState|null
     *
     * @Serializer\SerializedName("state")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Account\AccountState")
     */
    private $state;

    /**
     * @return AccountChanges|null
     */
    public function getChanges(): ?AccountChanges
    {
        return $this->changes;
    }

    /**
     * @param AccountChanges|null $changes
     *
     * @return AccountChangesResponse
     */
    public function setChanges(?AccountChanges $changes): self
    {
        $this->changes = $changes;

        return $this;
    }

    /**
     * @return AccountState|null
     */
    public function getState(): ?AccountState
    {
        return $this->state;
    }

    /**
     * @param AccountState|null $state
     *
     * @return AccountChangesResponse
     */
    public function setState(?AccountState $state): self
    {
        $this->state = $state;

        return $this;
    }
}
