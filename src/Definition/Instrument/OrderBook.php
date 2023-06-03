<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Instrument;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class OrderBook.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class OrderBook
{
    /**
     * @var Book|null
     *
     * @Serializer\SerializedName("orderBook")
     *
     * @Serializer\Type("Mab05k\OandaClient\Definition\Instrument\Book")
     */
    private $orderBook;

    /**
     * @return Book|null
     */
    public function getOrderBook(): ?Book
    {
        return $this->orderBook;
    }

    /**
     * @param Book|null $orderBook
     *
     * @return OrderBook
     */
    public function setOrderBook(?Book $orderBook): self
    {
        $this->orderBook = $orderBook;

        return $this;
    }
}
