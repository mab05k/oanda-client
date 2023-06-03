<?php

/*
 * This file is part of the Mab05k Oanda Client Bundle.
 * (c) Michael A. Bos <mab05k@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Mab05k\OandaClient\Tests\Unit\Helper;

use Mab05k\OandaClient\Helper\StreamResponseHelper;
use Phake\Mock;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

class StreamResponseHelperTest extends TestCase
{
    #[Mock(StreamInterface::class)]
    private $stream;

    protected function setUp(): void
    {
        \Phake::initAnnotations($this);
    }

    public function testReadLine()
    {
        \Phake::when($this->stream)->eof()
            ->thenReturn(false)
            ->thenReturn(false)
            ->thenReturn(false)
            ->thenReturn(true);
        \Phake::when($this->stream)->read(1)
            ->thenReturn('a')
            ->thenReturn('b')
            ->thenReturn(\PHP_EOL);

        $result = StreamResponseHelper::readLine($this->stream);

        $this->assertEquals('ab'.\PHP_EOL, $result);
    }
}
