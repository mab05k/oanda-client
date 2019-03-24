<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Definition\Transaction\ClientExtension\Factory;

use Mab05k\OandaClient\Definition\Transaction\ClientExtension\ClientExtension;

/**
 * Class ClientExtensionFactory.
 */
class ClientExtensionFactory
{
    private static function init(): ClientExtension
    {
        return new ClientExtension();
    }

    /**
     * @param string|null $id
     * @param string|null $tag
     * @param string|null $comment
     *
     * @return ClientExtension
     */
    public static function create(
        ?string $id = null,
        ?string $tag = null,
        ?string $comment = null
    ): ClientExtension {
        return self::init()
            ->setId($id)
            ->setTag($tag)
            ->setComment($comment);
    }
}
