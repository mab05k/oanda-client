<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Account;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Account\Instrument;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;

/**
 * Class InstrumentResponse.
 */
class InstrumentResponse
{
    use LastTransactionIdTrait;

    /**
     * @var array|Instrument[]
     *
     * @Serializer\SerializedName("instruments")
     *
     * @Serializer\Type("array<Mab05k\OandaClient\Definition\Account\Instrument>")
     */
    private $instruments = [];

    /**
     * @return array|Instrument[]
     */
    public function getInstruments()
    {
        return $this->instruments;
    }

    /**
     * @param array|Instrument[] $instruments
     *
     * @return InstrumentResponse
     */
    public function setInstruments($instruments)
    {
        $this->instruments = $instruments;

        return $this;
    }
}
