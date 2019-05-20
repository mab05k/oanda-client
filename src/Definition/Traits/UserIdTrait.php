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
 * Trait UserIdTrait.
 */
trait UserIdTrait
{
    /**
     * @var int|null
     *
     * @Serializer\SerializedName("userID")
     * @Serializer\Type("integer")
     */
    private $userId;
}
