<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Instrument;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class PositionBook.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class PositionBook
{
    /**
     * @var Book|null
     *
     * @Serializer\SerializedName("positionBook")
     */
    private $positionBook;

    /**
     * @return Book|null
     */
    public function getPositionBook(): ?Book
    {
        return $this->positionBook;
    }

    /**
     * @param Book|null $positionBook
     *
     * @return PositionBook
     */
    public function setPositionBook(?Book $positionBook): self
    {
        $this->positionBook = $positionBook;

        return $this;
    }
}
