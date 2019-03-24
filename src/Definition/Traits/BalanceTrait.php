<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Brick\Money\Money;
use JMS\Serializer\Annotation as Serializer;

/**
 * Trait BalanceTrait.
 */
trait BalanceTrait
{
    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("balance")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $balance;

    /**
     * @return Money|null
     */
    public function getBalance(): ?Money
    {
        return $this->balance;
    }

    /**
     * @param Money|null $balance
     *
     * @return $this
     */
    public function setBalance(?Money $balance)
    {
        $this->balance = $balance;

        return $this;
    }
}
