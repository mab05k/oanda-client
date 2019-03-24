<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Position;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Position\Position;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;

/**
 * Class Positions.
 */
class PositionsResponse
{
    use LastTransactionIdTrait;

    /**
     * @var array|Position[]|null
     *
     * @Serializer\SerializedName("positions")
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Position\Position>")
     */
    private $positions;

    /**
     * @return array|Position[]|null
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param array|Position[]|null $positions
     *
     * @return PositionsResponse
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }
}
