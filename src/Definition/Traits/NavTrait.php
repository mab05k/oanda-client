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

trait NavTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("NAV")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $nav;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getNav(): ?Money
    {
        return $this->nav;
    }

    /**
     * @param \Brick\Money\Money|null $nav
     *
     * @return $this
     */
    public function setNav(?Money $nav)
    {
        $this->nav = $nav;

        return $this;
    }
}
