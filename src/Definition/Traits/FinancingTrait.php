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

/**
 * Trait FinancingTrait.
 */
trait FinancingTrait
{
    /**
     * @var Money|null
     *
     * @Serializer\SerializedName("financing")
     * @Serializer\Type("Brick\Money\Money")
     */
    private $financing;

    /**
     * @return Money|null
     */
    public function getFinancing(): ?Money
    {
        return $this->financing;
    }

    /**
     * @param Money|null $financing
     *
     * @return $this
     */
    public function setFinancing(?Money $financing)
    {
        $this->financing = $financing;

        return $this;
    }
}
