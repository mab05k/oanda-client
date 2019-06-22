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
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait WithdrawalLimitTrait.
 */
trait WithdrawalLimitTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("withdrawalLimit")
     */
    private $withdrawalLimit;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getWithdrawalLimit(): ?Money
    {
        return $this->withdrawalLimit;
    }

    /**
     * @param \Brick\Money\Money|null $withdrawalLimit
     *
     * @return $this
     */
    public function setWithdrawalLimit(?Money $withdrawalLimit)
    {
        $this->withdrawalLimit = $withdrawalLimit;

        return $this;
    }
}
