<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Position;

use Mab05k\OandaClient\Definition\Traits\CommissionTrait;
use Mab05k\OandaClient\Definition\Traits\FinancingTrait;
use Mab05k\OandaClient\Definition\Traits\GuaranteedExecutionFeesTrait;
use Mab05k\OandaClient\Definition\Traits\InstrumentTrait;
use Mab05k\OandaClient\Definition\Traits\MarginUsedTrait;
use Mab05k\OandaClient\Definition\Traits\ProfitLossTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Position.
 */
class Position
{
    use ProfitLossTrait;
    use GuaranteedExecutionFeesTrait;
    use MarginUsedTrait;
    use FinancingTrait;
    use CommissionTrait;
    use InstrumentTrait;

    /**
     * @var PositionSide|null
     *
     * @Serializer\SerializedName("long")
     */
    private $long;

    /**
     * @var PositionSide|null
     *
     * @Serializer\SerializedName("short")
     */
    private $short;

    /**
     * @return PositionSide|null
     */
    public function getLong(): ?PositionSide
    {
        return $this->long;
    }

    /**
     * @param PositionSide|null $long
     *
     * @return Position
     */
    public function setLong(?PositionSide $long): self
    {
        $this->long = $long;

        return $this;
    }

    /**
     * @return PositionSide|null
     */
    public function getShort(): ?PositionSide
    {
        return $this->short;
    }

    /**
     * @param PositionSide|null $short
     *
     * @return Position
     */
    public function setShort(?PositionSide $short): self
    {
        $this->short = $short;

        return $this;
    }
}
