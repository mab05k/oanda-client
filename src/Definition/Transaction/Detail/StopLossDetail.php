<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Detail;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\ClientExtensionsTrait;
use Mab05k\OandaClient\Definition\Traits\DistanceTrait;
use Mab05k\OandaClient\Definition\Traits\GoodUntilDateTrait;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Mab05k\OandaClient\Definition\Traits\TimeInForceTrait;

/**
 * Class StopLossDetail.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class StopLossDetail
{
    use TimeInForceTrait;
    use PriceTrait;
    use GoodUntilDateTrait;
    use ClientExtensionsTrait;
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
     * @return StopLossDetail
     */
    public function setGuaranteed(?bool $guaranteed): self
    {
        $this->guaranteed = $guaranteed;

        return $this;
    }
}
