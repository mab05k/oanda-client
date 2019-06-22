<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Instrument;

use Brick\Math\BigDecimal;
use Mab05k\OandaClient\Definition\Traits\PriceTrait;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class OrderBookBucket.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class BookBucket
{
    use PriceTrait;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("longCountPercent")
     */
    private $longCountPercent;

    /**
     * @var \Brick\Math\BigDecimal|null
     *
     * @Serializer\SerializedName("shortCountPercent")
     */
    private $shortCountPercent;

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getLongCountPercent(): ?BigDecimal
    {
        return $this->longCountPercent;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $longCountPercent
     *
     * @return BookBucket
     */
    public function setLongCountPercent(?BigDecimal $longCountPercent): self
    {
        $this->longCountPercent = $longCountPercent;

        return $this;
    }

    /**
     * @return \Brick\Math\BigDecimal|null
     */
    public function getShortCountPercent(): ?BigDecimal
    {
        return $this->shortCountPercent;
    }

    /**
     * @param \Brick\Math\BigDecimal|null $shortCountPercent
     *
     * @return BookBucket
     */
    public function setShortCountPercent(?BigDecimal $shortCountPercent): self
    {
        $this->shortCountPercent = $shortCountPercent;

        return $this;
    }
}
