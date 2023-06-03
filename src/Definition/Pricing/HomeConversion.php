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
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\CurrencyTrait;

class HomeConversion
{
    use CurrencyTrait;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("accountGain")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $accountGain;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("accountLoss")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $accountLoss;

    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("positionValue")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $positionValue;

    /**
     * @return Money|null
     */
    public function getAccountGain(): ?Money
    {
        return $this->accountGain;
    }

    /**
     * @param Money|null $accountGain
     *
     * @return HomeConversion
     */
    public function setAccountGain(?Money $accountGain): self
    {
        $this->accountGain = $accountGain;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getAccountLoss(): ?Money
    {
        return $this->accountLoss;
    }

    /**
     * @param Money|null $accountLoss
     *
     * @return HomeConversion
     */
    public function setAccountLoss(?Money $accountLoss): self
    {
        $this->accountLoss = $accountLoss;

        return $this;
    }

    /**
     * @return Money|null
     */
    public function getPositionValue(): ?Money
    {
        return $this->positionValue;
    }

    /**
     * @param Money|null $positionValue
     *
     * @return HomeConversion
     */
    public function setPositionValue(?Money $positionValue): self
    {
        $this->positionValue = $positionValue;

        return $this;
    }
}
