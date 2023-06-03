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
 * Trait ReplacedOrderTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait ReplacedOrderTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("replacesOrderID")
     *
     * @Serializer\Type("string")
     */
    private $replacesOrderId;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("replacedByOrderID")
     *
     * @Serializer\Type("string")
     */
    private $replacedByOrderId;

    /**
     * @return string|null
     */
    public function getReplacesOrderId(): ?string
    {
        return $this->replacesOrderId;
    }

    /**
     * @param string|null $replacesOrderId
     *
     * @return $this
     */
    public function setReplacesOrderId(?string $replacesOrderId)
    {
        $this->replacesOrderId = $replacesOrderId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReplacedByOrderId(): ?string
    {
        return $this->replacedByOrderId;
    }

    /**
     * @param string|null $replacedByOrderId
     *
     * @return $this
     */
    public function setReplacedByOrderId(?string $replacedByOrderId)
    {
        $this->replacedByOrderId = $replacedByOrderId;

        return $this;
    }
}
