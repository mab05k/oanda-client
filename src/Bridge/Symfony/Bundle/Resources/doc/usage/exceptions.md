# Exceptions System

All Exceptions have specific identifiers to help understand why exceptions are being thrown.

## Exception Code Map
| Error Code | Exception | Description | 
| --- | --- | --- |
| 1001 | ConfigurationException | At least 1 Account must be configured for this bundle to work properly |
| 1002 | ConfigurationException | The Account Id or Name you searched for is not configured |
| 2001 | ResponseDeserializationException | Unexpected Exception during deserialization - this is likely a bug in the code :( |
| 2002 | ResponseDeserializationException | Deserialization resulted in an unexpected Object Type, $deserializationType did not match $result Type |
| 4001 | CandlePriceException | When attempting to get the price of a candlestick, no price (Ask, Bid, or Mid) was found |
| 4002 | InvalidPriceException | A pricing object did not have an ask price |
| 4003 | InvalidPriceException | A pricing object did not have an ask price |
| 4004 | InvalidPriceException | A pricing object did not have a price |
| 4005 | PriceBucketNotFoundException | A price object did not have an Ask PriceBucket |
| 4006 | PriceBucketNotFoundException | A price object did not have a Bid PriceBucket |
