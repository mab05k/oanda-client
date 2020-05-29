# Stream Endpoints
Oanda offers two data streaming endpoints
* Pricing
* Transactions

Example Consuming Streaming Endpoints

```php
<?php

namespace App;

use Mab05k\OandaClient\Client\StreamClient;
use Mab05k\OandaClient\Helper\StreamResponseHelper;
use Mab05k\OandaClient\Request\Query\Pricing\Instruments;
use Mab05k\OandaClient\Request\Query\QueryBuilderFactory;

class PriceStream
{
    private StreamClient $streamClient;

    public function __construct(StreamClient $streamClient)
    {
        $this->streamClient = $streamClient;
    }

    protected function stream()
    {
        $pricingStreamOptions = QueryBuilderFactory::pricingStream()
            ->set(Instruments::class, [Instruments::EUR_USD]);
        $priceStream = $this->streamClient->pricingStream($pricingStreamOptions);

        while (!$eof = $priceStream->eof()) {
            try {
                $line = StreamResponseHelper::readLine($priceStream);
                echo $line;
            } catch (\Throwable $ex) {
                echo 'handled error';
            }
        }
    }
}
```

This function will loop through the stream as Oanda published updated prices.
