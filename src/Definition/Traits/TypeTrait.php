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

/**
 * Class TypeTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TypeTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("type")
     *
     * @Serializer\Type("string")
     */
    private $type;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return $this
     */
    public function setType(?string $type)
    {
        $this->type = $type;

        return $this;
    }
}
