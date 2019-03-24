<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query;

/**
 * Class AbstractBooleanOption.
 */
abstract class AbstractBooleanQueryParameter extends AbstractQueryParameter implements QueryParameterInterface
{
    /**
     * AbstractStringOption constructor.
     *
     * @param bool $value
     */
    public function __construct(?bool $value = null)
    {
        if (null === $value) {
            parent::__construct(null);

            return;
        }

        if (true === $value) {
            parent::__construct('true');
        } else {
            parent::__construct('false');
        }
    }
}
