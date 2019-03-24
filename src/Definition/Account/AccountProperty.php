<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Account;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AccountProperty.
 */
class AccountProperty
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("id")
     * @Serializer\Type("string")
     */
    private $id;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("mt4AccountID")
     * @Serializer\Type("integer")
     */
    private $mt4AccountId;

    /**
     * @var array
     *
     * @Serializer\SerializedName("tags")
     * @Serializer\Type("array<string>")
     */
    private $tags = [];

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
     * @return AccountProperty
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMt4AccountId(): ?int
    {
        return $this->mt4AccountId;
    }

    /**
     * @param int|null $mt4AccountId
     *
     * @return AccountProperty
     */
    public function setMt4AccountId(?int $mt4AccountId): self
    {
        $this->mt4AccountId = $mt4AccountId;

        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     *
     * @return AccountProperty
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}
