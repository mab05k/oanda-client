<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Response\Transaction;

use JMS\Serializer\Annotation as Serializer;
use Mab05k\OandaClient\Definition\Traits\LastTransactionIdTrait;
use Mab05k\OandaClient\Definition\Traits\TypeTrait;

/**
 * Class TransactionsPagesResponse.
 */
class TransactionsPagesResponse
{
    use LastTransactionIdTrait;
    use TypeTrait;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("from")
     *
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $from;

    /**
     * @var \DateTime|null
     *
     * @Serializer\SerializedName("to")
     *
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.u???\Z'>")
     */
    private $to;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("pageSize")
     *
     * @Serializer\Type("integer")
     */
    private $pageSize;

    /**
     * @var int|null
     *
     * @Serializer\SerializedName("count")
     *
     * @Serializer\Type("integer")
     */
    private $count;

    /**
     * @var array|null
     *
     * @Serializer\SerializedName("pages")
     *
     * @Serializer\Type("array<string>")
     */
    private $pages;

    /**
     * @return \DateTime|null
     */
    public function getFrom(): ?\DateTime
    {
        return $this->from;
    }

    /**
     * @param \DateTime|null $from
     *
     * @return TransactionsPagesResponse
     */
    public function setFrom(?\DateTime $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTo(): ?\DateTime
    {
        return $this->to;
    }

    /**
     * @param \DateTime|null $to
     *
     * @return TransactionsPagesResponse
     */
    public function setTo(?\DateTime $to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    /**
     * @param int|null $pageSize
     *
     * @return TransactionsPagesResponse
     */
    public function setPageSize(?int $pageSize): self
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     *
     * @return TransactionsPagesResponse
     */
    public function setCount(?int $count): self
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getPages(): ?array
    {
        return $this->pages;
    }

    /**
     * @param array|null $pages
     *
     * @return TransactionsPagesResponse
     */
    public function setPages(?array $pages): self
    {
        $this->pages = $pages;

        return $this;
    }
}
