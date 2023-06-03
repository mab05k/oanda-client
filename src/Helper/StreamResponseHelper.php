<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Helper;

use Psr\Http\Message\StreamInterface;

class StreamResponseHelper
{
    /**
     * @param StreamInterface $stream
     * @param int             $maxLength
     * @param string          $eol
     *
     * @return string
     */
    public static function readLine(StreamInterface $stream, $maxLength = 4069, $eol = \PHP_EOL)
    {
        $buffer = '';
        $size = 0;
        $negEolLen = -\strlen($eol);
        while (!$stream->eof()) {
            if (false === ($byte = $stream->read(1))) {
                return $buffer;
            }
            $buffer .= $byte;
            // Break when a new line is found or the max length - 1 is reached
            if (++$size === $maxLength || substr($buffer, $negEolLen) === $eol) {
                break;
            }
        }

        return $buffer;
    }
}
