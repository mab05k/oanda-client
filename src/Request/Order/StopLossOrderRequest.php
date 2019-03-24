<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Order;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\DistanceTrait;

/**
 * Class StopLossOrderRequest.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class StopLossOrderRequest extends AbstractTradeOrderRequest
{
    use DistanceTrait;

    /**
     * @var bool|null
     *
     * @Serializer\SerializedName("guaranteed")
     * @Serializer\Type("boolean")
     */
    private $guaranteed;

    /**
     * @return bool|null
     */
    public function getGuaranteed(): ?bool
    {
        return $this->guaranteed;
    }

    /**
     * @param bool|null $guaranteed
     *
     * @return StopLossOrderRequest
     */
    public function setGuaranteed(?bool $guaranteed): self
    {
        $this->guaranteed = $guaranteed;

        return $this;
    }
}
