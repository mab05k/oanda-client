<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query\Candle;

use Mab05k\OandaClient\Request\Query\AbstractQueryParameter;
use Mab05k\OandaClient\Request\Query\QueryParameterInterface;

/**
 * Class Granularity.
 *
 * @author Michael Bos <mab05k@gmail.com>
 */
class CandlestickGranularity extends AbstractQueryParameter implements QueryParameterInterface
{
    public const KEY = 'granularity';

    public const S1 = 'S1';
    public const S3 = 'S3';
    public const S5 = 'S5';
    public const M1 = 'M1';
    public const M2 = 'M2';
    public const M4 = 'M4';
    public const M5 = 'M5';
    public const M10 = 'M10';
    public const M15 = 'M15';
    public const M30 = 'M30';
    public const H1 = 'H1';
    public const H2 = 'H2';
    public const H3 = 'H3';
    public const H4 = 'H4';
    public const H6 = 'H6';
    public const H8 = 'H8';
    public const H12 = 'H12';
    public const D = 'D';
    public const W = 'W';
    public const M = 'M';
}
