<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Request\Query\Order;

use Mab05k\OandaClient\Request\Query\AbstractQueryParameter;
use Mab05k\OandaClient\Request\Query\QueryParameterInterface;

/**
 * Class Instrument.
 */
class Instrument extends AbstractQueryParameter implements QueryParameterInterface
{
    public const KEY = 'instrument';

    public const EUR_CHF = 'EUR_CHF';
    public const AUD_SGD = 'AUD_SGD';
    public const EUR_NOK = 'EUR_NOK';
    public const GBP_USD = 'GBP_USD';
    public const USD_MXN = 'USD_MXN';
    public const CAD_HKD = 'CAD_HKD';
    public const CAD_CHF = 'CAD_CHF';
    public const SGD_CHF = 'SGD_CHF';
    public const USD_CHF = 'USD_CHF';
    public const AUD_CHF = 'AUD_CHF';
    public const USD_ZAR = 'USD_ZAR';
    public const GBP_HKD = 'GBP_HKD';
    public const EUR_GBP = 'EUR_GBP';
    public const GBP_SGD = 'GBP_SGD';
    public const USD_SEK = 'USD_SEK';
    public const EUR_CAD = 'EUR_CAD';
    public const USD_TRY = 'USD_TRY';
    public const GBP_JPY = 'GBP_JPY';
    public const GBP_PLN = 'GBP_PLN';
    public const NZD_USD = 'NZD_USD';
    public const EUR_JPY = 'EUR_JPY';
    public const NZD_CAD = 'NZD_CAD';
    public const GBP_ZAR = 'GBP_ZAR';
    public const ZAR_JPY = 'ZAR_JPY';
    public const NZD_SGD = 'NZD_SGD';
    public const GBP_CAD = 'GBP_CAD';
    public const USD_SAR = 'USD_SAR';
    public const CAD_JPY = 'CAD_JPY';
    public const NZD_CHF = 'NZD_CHF';
    public const NZD_HKD = 'NZD_HKD';
    public const GBP_NZD = 'GBP_NZD';
    public const AUD_HKD = 'AUD_HKD';
    public const EUR_CZK = 'EUR_CZK';
    public const CHF_ZAR = 'CHF_ZAR';
    public const NZD_JPY = 'NZD_JPY';
    public const HKD_JPY = 'HKD_JPY';
    public const USD_HUF = 'USD_HUF';
    public const CAD_SGD = 'CAD_SGD';
    public const USD_NOK = 'USD_NOK';
    public const USD_CAD = 'USD_CAD';
    public const AUD_JPY = 'AUD_JPY';
    public const EUR_PLN = 'EUR_PLN';
    public const EUR_ZAR = 'EUR_ZAR';
    public const EUR_HKD = 'EUR_HKD';
    public const USD_CNH = 'USD_CNH';
    public const EUR_HUF = 'EUR_HUF';
    public const SGD_HKD = 'SGD_HKD';
    public const AUD_NZD = 'AUD_NZD';
    public const EUR_USD = 'EUR_USD';
    public const EUR_DKK = 'EUR_DKK';
    public const AUD_USD = 'AUD_USD';
    public const CHF_HKD = 'CHF_HKD';
    public const TRY_JPY = 'TRY_JPY';
    public const USD_THB = 'USD_THB';
    public const GBP_CHF = 'GBP_CHF';
    public const AUD_CAD = 'AUD_CAD';
    public const SGD_JPY = 'SGD_JPY';
    public const EUR_NZD = 'EUR_NZD';
    public const USD_HKD = 'USD_HKD';
    public const EUR_SEK = 'EUR_SEK';
    public const USD_SGD = 'USD_SGD';
    public const USD_PLN = 'USD_PLN';
    public const GBP_AUD = 'GBP_AUD';
    public const USD_CZK = 'USD_CZK';
    public const EUR_TRY = 'EUR_TRY';
    public const USD_JPY = 'USD_JPY';
    public const EUR_SGD = 'EUR_SGD';
    public const CHF_JPY = 'CHF_JPY';
    public const EUR_AUD = 'EUR_AUD';
    public const USD_DKK = 'USD_DKK';
}
