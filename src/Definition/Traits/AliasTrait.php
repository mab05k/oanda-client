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
 * Trait AliasTrait.
 */
trait AliasTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("alias")
     *
     * @Serializer\Type("string")
     */
    private $alias;

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string|null $alias
     *
     * @return $this
     */
    public function setAlias(?string $alias)
    {
        $this->alias = $alias;

        return $this;
    }
}
