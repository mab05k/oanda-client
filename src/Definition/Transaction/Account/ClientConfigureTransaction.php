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
use Mab05k\OandaClient\Definition\Traits\AliasTrait;
use Mab05k\OandaClient\Definition\Traits\OrderTransactionTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ClientConfigureTransaction.
 */
class ClientConfigureTransaction
{
    use OrderTransactionTrait;
    use TypeTrait;
    use AliasTrait;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("marginRate")
     */
    private $marginRate;

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getMarginRate(): ?BigDecimal
    {
        return $this->marginRate;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $marginRate
     *
     * @return ClientConfigureTransaction
     */
    public function setMarginRate(?BigDecimal $marginRate): self
    {
        $this->marginRate = $marginRate;

        return $this;
    }
}
