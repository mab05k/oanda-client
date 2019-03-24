<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Fixtures;

/**
 * Class DummyResponse.
 */
class DummyResponse
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return DummyResponse
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }
}
