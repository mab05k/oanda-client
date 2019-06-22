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
 * Class ProfitLossTrait.
 */
trait ProfitLossTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("pl")
     */
    private $pl;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("unrealizedPL")
     */
    private $unrealizedPl;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("resettablePL")
     */
    private $resettablePl;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getPl(): ?Money
    {
        return $this->pl;
    }

    /**
     * @param \Brick\Money\Money|null $pl
     *
     * @return $this
     */
    public function setPl(?Money $pl)
    {
        $this->pl = $pl;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getUnrealizedPl(): ?Money
    {
        return $this->unrealizedPl;
    }

    /**
     * @param \Brick\Money\Money|null $unrealizedPl
     *
     * @return $this
     */
    public function setUnrealizedPl(?Money $unrealizedPl)
    {
        $this->unrealizedPl = $unrealizedPl;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getResettablePl(): ?Money
    {
        return $this->resettablePl;
    }

    /**
     * @param \Brick\Money\Money|null $resettablePl
     *
     * @return $this
     */
    public function setResettablePl(?Money $resettablePl)
    {
        $this->resettablePl = $resettablePl;

        return $this;
    }
}
