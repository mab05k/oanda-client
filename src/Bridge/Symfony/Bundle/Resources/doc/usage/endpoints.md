# Endpoints Usage

Most Oanda Endpoints require you to pass in the Account Id that you wish to use. This bundle handles that by using
the bundle configuration, so you do not have to pass in an "account" argument for each call. More details on this in
the [Multiple Accounts](multiple_accounts.md) section.

## Requests that require a Body
For requests that require a JSON body (POST, PUT), there are Factory Methods to help with creating the Bodies

To Create a Market Order Request
```php
Mab05k\OandaClient\Request\OrderRequestFactory::marketOrderRequest(
    Mab05k\OandaClient\Request\Query\Order\Instrument::EUR_USD,
    Brick\Math\BigDecimal::of(1000)
);
```

All Factory Classes can be found [here](/src/DTO/Factory)

## Requests that require Query Parameters
This bundle implements a QueryBuilder Strategy for creating query parameters. And there are Factory Helpers for 
creating queries. The helpers create default query options. Any query option that has a null value will not be included
in the request.

```php
$candleOptions = Mab05k\OandaClient\Request\Query\QueryBuilderFactory::candleOptions();
$candleOptions->set(Mab05k\OandaClient\Request\Query\Candle\Count::class, 100);
```