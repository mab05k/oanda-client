<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Trait CancelledOrderTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait CancelledOrderTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("cancellingTransactionID")
     */
    private $cancellingTransactionId;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("cancelledTime")
     */
    private $cancelledTime;

    /**
     * @return string|null
     */
    public function getCancellingTransactionId(): ?string
    {
        return $this->cancellingTransactionId;
    }

    /**
     * @param string|null $cancellingTransactionId
     *
     * @return $this
     */
    public function setCancellingTransactionId(?string $cancellingTransactionId)
    {
        $this->cancellingTransactionId = $cancellingTransactionId;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCancelledTime(): ?\DateTime
    {
        return $this->cancelledTime;
    }

    /**
     * @param \DateTime|null $cancelledTime
     *
     * @return $this
     */
    public function setCancelledTime(?\DateTime $cancelledTime)
    {
        $this->cancelledTime = $cancelledTime;

        return $this;
    }
}
