<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Pricing\Price;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class UnitsAvailable.
 */
class UnitsAvailable
{
    /**
     * @var UnitAvailable|null
     *
     * @Serializer\SerializedName("default")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\UnitAvailable")
     */
    private $default;

    /**
     * @var UnitAvailable|null
     *
     * @Serializer\SerializedName("openOnly")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\UnitAvailable")
     */
    private $openOnly;

    /**
     * @var UnitAvailable|null
     *
     * @Serializer\SerializedName("reduceFirst")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\UnitAvailable")
     */
    private $reduceFirst;

    /**
     * @var UnitAvailable|null
     *
     * @Serializer\SerializedName("reduceOnly")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Pricing\Price\UnitAvailable")
     */
    private $reduceOnly;

    /**
     * @return UnitAvailable|null
     */
    public function getDefault(): ?UnitAvailable
    {
        return $this->default;
    }

    /**
     * @param UnitAvailable|null $default
     *
     * @return UnitsAvailable
     */
    public function setDefault(?UnitAvailable $default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return UnitAvailable|null
     */
    public function getOpenOnly(): ?UnitAvailable
    {
        return $this->openOnly;
    }

    /**
     * @param UnitAvailable|null $openOnly
     *
     * @return UnitsAvailable
     */
    public function setOpenOnly(?UnitAvailable $openOnly): self
    {
        $this->openOnly = $openOnly;

        return $this;
    }

    /**
     * @return UnitAvailable|null
     */
    public function getReduceFirst(): ?UnitAvailable
    {
        return $this->reduceFirst;
    }

    /**
     * @param UnitAvailable|null $reduceFirst
     *
     * @return UnitsAvailable
     */
    public function setReduceFirst(?UnitAvailable $reduceFirst): self
    {
        $this->reduceFirst = $reduceFirst;

        return $this;
    }

    /**
     * @return UnitAvailable|null
     */
    public function getReduceOnly(): ?UnitAvailable
    {
        return $this->reduceOnly;
    }

    /**
     * @param UnitAvailable|null $reduceOnly
     *
     * @return UnitsAvailable
     */
    public function setReduceOnly(?UnitAvailable $reduceOnly): self
    {
        $this->reduceOnly = $reduceOnly;

        return $this;
    }
}
