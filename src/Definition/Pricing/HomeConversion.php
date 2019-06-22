<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing;

use Brick\Money\Money;
use Mab05k\OandaClient\Definition\Traits\CurrencyTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

class HomeConversion
{
    use CurrencyTrait;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("accountGain")
     */
    private $accountGain;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("accountLoss")
     */
    private $accountLoss;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("positionValue")
     */
    private $positionValue;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getAccountGain(): ?Money
    {
        return $this->accountGain;
    }

    /**
     * @param \Brick\Money\Money|null $accountGain
     *
     * @return HomeConversion
     */
    public function setAccountGain(?Money $accountGain): self
    {
        $this->accountGain = $accountGain;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getAccountLoss(): ?Money
    {
        return $this->accountLoss;
    }

    /**
     * @param \Brick\Money\Money|null $accountLoss
     *
     * @return HomeConversion
     */
    public function setAccountLoss(?Money $accountLoss): self
    {
        $this->accountLoss = $accountLoss;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getPositionValue(): ?Money
    {
        return $this->positionValue;
    }

    /**
     * @param \Brick\Money\Money|null $positionValue
     *
     * @return HomeConversion
     */
    public function setPositionValue(?Money $positionValue): self
    {
        $this->positionValue = $positionValue;

        return $this;
    }
}
