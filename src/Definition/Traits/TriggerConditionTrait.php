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
 * Trait TriggerConditionTrait.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
trait TriggerConditionTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("triggerCondition")
     * @Serializer\Type("string")
     */
    private $triggerCondition;

    /**
     * @return string|null
     */
    public function getTriggerCondition(): ?string
    {
        return $this->triggerCondition;
    }

    /**
     * @param string|null $triggerCondition
     *
     * @return $this
     */
    public function setTriggerCondition(?string $triggerCondition)
    {
        $this->triggerCondition = $triggerCondition;

        return $this;
    }
}
