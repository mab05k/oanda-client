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
 * Trait CreateTimeTrait.
 */
trait CreateTimeTrait
{
    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("createTime")
     */
    private $createTime;

    /**
     * @return \DateTime|null
     */
    public function getCreateTime(): ?\DateTime
    {
        return $this->createTime;
    }

    /**
     * @param \DateTime|null $createTime
     *
     * @return $this
     */
    public function setCreateTime(?\DateTime $createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }
}
