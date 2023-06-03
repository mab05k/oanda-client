<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\Account;

use Brick\Math\BigDecimal;
use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\AliasTrait;
use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;

/**
 * Class ClientConfigureTransaction.
 */
class ClientConfigureTransaction
{
    use AliasTrait;
    use OrderTransactionTrait;
    use TypeTrait;

    /**
     * @var BigDecimal|null
     *
     * @Serializer\SerializedName("marginRate")
     *
     * @Serializer\Type("Brick\Math\BigDecimal")
     */
    private $marginRate;

    /**
     * @return BigDecimal|null
     */
    public function getMarginRate(): ?BigDecimal
    {
        return $this->marginRate;
    }

    /**
     * @param BigDecimal|null $marginRate
     *
     * @return ClientConfigureTransaction
     */
    public function setMarginRate(?BigDecimal $marginRate): self
    {
        $this->marginRate = $marginRate;

        return $this;
    }
}
