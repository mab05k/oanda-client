<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail;

/**
 * Trait TakeProfitOnFillTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TakeProfitOnFillTrait
{
    /**
     * @var \Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail|null
     *
     * @Serializer\SerializedName("takeProfitOnFill")
     * @Serializer\Type("Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail")
     */
    private $takeProfitOnFill;

    /**
     * @return \Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail|null
     */
    public function getTakeProfitOnFill(): ?TakeProfitDetail
    {
        return $this->takeProfitOnFill;
    }

    /**
     * @param \Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail|null $takeProfitOnFill
     *
     * @return $this
     */
    public function setTakeProfitOnFill(?TakeProfitDetail $takeProfitOnFill)
    {
        $this->takeProfitOnFill = $takeProfitOnFill;

        return $this;
    }
}
