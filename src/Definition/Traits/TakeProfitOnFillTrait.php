<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Mab05k\OandaClient\Definition\Transaction\Detail\TakeProfitDetail;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait TakeProfitOnFillTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TakeProfitOnFillTrait
{
    /**
     * @var TakeProfitDetail|null
     *
     * @Serializer\SerializedName("takeProfitOnFill")
     */
    private $takeProfitOnFill;

    /**
     * @return TakeProfitDetail|null
     */
    public function getTakeProfitOnFill(): ?TakeProfitDetail
    {
        return $this->takeProfitOnFill;
    }

    /**
     * @param TakeProfitDetail|null $takeProfitOnFill
     *
     * @return $this
     */
    public function setTakeProfitOnFill(?TakeProfitDetail $takeProfitOnFill)
    {
        $this->takeProfitOnFill = $takeProfitOnFill;

        return $this;
    }
}
