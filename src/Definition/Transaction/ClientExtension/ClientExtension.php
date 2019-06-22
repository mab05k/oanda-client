<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\ClientExtension;

use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Class ClientExtension.
 */
class ClientExtension
{
    /**
     * @var string|null
     *
     * @Serializer\SerializedName("id")
     */
    private $id;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("tag")
     */
    private $tag;

    /**
     * @var string|null
     *
     * @Serializer\SerializedName("comment")
     */
    private $comment;

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
     * @return ClientExtension
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string|null $tag
     *
     * @return ClientExtension
     */
    public function setTag(?string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return ClientExtension
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
