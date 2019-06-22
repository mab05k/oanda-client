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

trait InstrumentTrait
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("instrument")
     */
    private $instrument;

    /**
     * @return string|null
     */
    public function getInstrument(): ?string
    {
        return $this->instrument;
    }

    /**
     * @param string|null $instrument
     *
     * @return $this
     */
    public function setInstrument(?string $instrument)
    {
        $this->instrument = $instrument;

        return $this;
    }
}
