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
 * Class ProfitLossTrait.
 */
trait ProfitLossTrait
{
    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("pl")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $profitLoss;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("unrealizedPL")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $unrealizedProfitLoss;

    /**
     * @var \Brick\Money\Money|null
     *
     * @Serializer\SerializedName("resettablePL")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $resettableProfitLoss;

    /**
     * @return \Brick\Money\Money|null
     */
    public function getProfitLoss(): ?Money
    {
        return $this->profitLoss;
    }

    /**
     * @param \Brick\Money\Money|null $profitLoss
     *
     * @return $this
     */
    public function setProfitLoss(?Money $profitLoss)
    {
        $this->profitLoss = $profitLoss;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getUnrealizedProfitLoss(): ?Money
    {
        return $this->unrealizedProfitLoss;
    }

    /**
     * @param \Brick\Money\Money|null $unrealizedProfitLoss
     *
     * @return $this
     */
    public function setUnrealizedProfitLoss(?Money $unrealizedProfitLoss)
    {
        $this->unrealizedProfitLoss = $unrealizedProfitLoss;

        return $this;
    }

    /**
     * @return \Brick\Money\Money|null
     */
    public function getResettableProfitLoss(): ?Money
    {
        return $this->resettableProfitLoss;
    }

    /**
     * @param \Brick\Money\Money|null $resettableProfitLoss
     *
     * @return $this
     */
    public function setResettableProfitLoss(?Money $resettableProfitLoss)
    {
        $this->resettableProfitLoss = $resettableProfitLoss;

        return $this;
    }
}
