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
 * Class CommissionTrait.
 */
trait CommissionTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("commission")
     *
     * @Serializer\Type("Brick\Money\Money")
     */
    private $commission;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getCommission(): ?Money
    {
        return $this->commission;
    }

    /**
     * @param \Brick\Money\Money|null $commission
     *
     * @return $this
     */
    public function setCommission(?Money $commission)
    {
        $this->commission = $commission;

        return $this;
    }
}
