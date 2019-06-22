<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

/**
 * Class InstrumentCollection.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class InstrumentCollection
{
    /**
     * @var Instrument[]
     */
    private $instruments;

    /**
     * @return Instrument[]|array
     */
    public function getInstruments()
    {
        return $this->instruments;
    }

    /**
     * @param Instrument[] $instruments
     *
     * @return InstrumentCollection
     */
    public function setInstruments(array $instruments): self
    {
        $this->instruments = $instruments;

        return $this;
    }
}
