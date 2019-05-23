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
 * Trait FilledOrderTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait FilledOrderTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("fillingTransactionID")
     * @Serializer\Type("string")
     */
    private $fillingTransactionId;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("filledTime")
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $filledTime;

    /**
     * @return string|null
     */
    public function getFillingTransactionId(): ?string
    {
        return $this->fillingTransactionId;
    }

    /**
     * @param string|null $fillingTransactionId
     *
     * @return $this
     */
    public function setFillingTransactionId(?string $fillingTransactionId)
    {
        $this->fillingTransactionId = $fillingTransactionId;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFilledTime(): ?\DateTime
    {
        return $this->filledTime;
    }

    /**
     * @param \DateTime|null $filledTime
     *
     * @return $this
     */
    public function setFilledTime(?\DateTime $filledTime)
    {
        $this->filledTime = $filledTime;

        return $this;
    }
}
