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
 * Class AbstractCsvQueryParameter.
 */
abstract class AbstractCsvQueryParameter extends AbstractQueryParameter implements QueryParameterInterface
{
    /**
     * AbstractCsvQueryParameter constructor.
     *
     * @param null $value
     */
    public function __construct(?array $value = null)
    {
        if (null === $value) {
            parent::__construct(null);

            return;
        }

        parent::__construct(implode(',', $value));
    }
}
