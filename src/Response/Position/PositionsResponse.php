<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Position;

use Mab05k\OandaClient\Definition\Position\Position;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class Positions.
 */
class PositionsResponse
{
    use LastTransactionIdTrait;

    /**
     * @var Position[]|null
     *
     * @Serializer\SerializedName("positions")
     */
    private $positions;

    /**
     * @return Position[]|null
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param Position[]|null $positions
     *
     * @return PositionsResponse
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }
}
