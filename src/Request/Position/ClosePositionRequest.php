<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Position;

use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ClosePositionRequest.
 */
class ClosePositionRequest
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("longUnits")
     */
    private $longUnits;

    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("longClientExtensions")
     */
    private $longClientExtensions;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("shortUnits")
     */
    private $shortUnits;

    /**
     * @var ClientExtension|null
     *
     * @Serializer\SerializedName("shortClientExtensions")
     */
    private $shortClientExtensions;

    /**
     * @return string|null
     */
    public function getLongUnits(): ?string
    {
        return $this->longUnits;
    }

    /**
     * @param string|null $longUnits
     *
     * @return ClosePositionRequest
     */
    public function setLongUnits(?string $longUnits): self
    {
        $this->longUnits = $longUnits;

        return $this;
    }

    /**
     * @return ClientExtension|null
     */
    public function getLongClientExtensions(): ?ClientExtension
    {
        return $this->longClientExtensions;
    }

    /**
     * @param ClientExtension|null $longClientExtensions
     *
     * @return ClosePositionRequest
     */
    public function setLongClientExtensions(?ClientExtension $longClientExtensions): self
    {
        $this->longClientExtensions = $longClientExtensions;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortUnits(): ?string
    {
        return $this->shortUnits;
    }

    /**
     * @param string|null $shortUnits
     *
     * @return ClosePositionRequest
     */
    public function setShortUnits(?string $shortUnits): self
    {
        $this->shortUnits = $shortUnits;

        return $this;
    }

    /**
     * @return ClientExtension|null
     */
    public function getShortClientExtensions(): ?ClientExtension
    {
        return $this->shortClientExtensions;
    }

    /**
     * @param ClientExtension|null $shortClientExtensions
     *
     * @return ClosePositionRequest
     */
    public function setShortClientExtensions(?ClientExtension $shortClientExtensions): self
    {
        $this->shortClientExtensions = $shortClientExtensions;

        return $this;
    }
}
