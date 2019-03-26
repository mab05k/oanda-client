# Oanda Client  [![CircleCI](https://circleci.com/gh/mab05k/oanda-client/tree/master.svg?style=svg)](https://circleci.com/gh/mab05k/oanda-client/tree/master)

This is a PHP Client Library for interacting with the [Oanda REST-V20 API](http://developer.oanda.com/rest-live-v20/introduction/).
This API is designed with flexibility in mind, and supports using multiple Oanda Accounts.

## Contributing
If you want to help contribute, please visit the [Contributing](CONTRIBUTING.md) documentation.

## Endpoints
* [Account](http://developer.oanda.com/rest-live-v20/account-ep/)
* [Instrument](http://developer.oanda.com/rest-live-v20/instrument-ep/)
* [Order](http://developer.oanda.com/rest-live-v20/order-ep/)
* [Trade](http://developer.oanda.com/rest-live-v20/trade-ep/)
* [Position](http://developer.oanda.com/rest-live-v20/position-ep/)
* [Transaction](http://developer.oanda.com/rest-live-v20/transaction-ep/)
* [Pricing](http://developer.oanda.com/rest-live-v20/pricing-ep/)

## Configuration 
Configuration is done using Standard Symfony Bundle Configuration

```yaml
# config/bundles.php

<?php

return [
    Mab05k\OandaClient\Bridge\Symfony\Bundle\BosOandaClientBundle::class => ['all' => true],
    Http\HttplugBundle\HttplugBundle::class => ['all' => true],
    JMS\SerializerBundle\JMSSerializerBundle::class => ['all' => true],
];
```

```yaml
# config/packages/oanda_client.yaml

mab05k_oanda_client:
  hostname: https://api-fxpractice.oanda.com
  path_prefix: /v3
  accounts:
  - name: primary_account
    account_id: 000-000-0000000-000
    account_secret: my_account_secret
  - name: secondary_account
    account_id: 000-000-0000000-001
    account_secret: my_account_secret
```

### Prepended Extensions
When the bundle is loaded by Symfony, it will automatically create the following [Httplug Configuration](http://docs.php-http.org/en/latest/integrations/symfony-full-configuration.html) for you. You
are free to override or extend this config if you wish with your own configurations.

```yaml
# This is an example, and does not need to be manually added to your configuration files
httplug:
  plugins:
    logger: 
      logger: 'logger'
  clients:
    mab05k_oanda_client:
      factory: 'httplug.collector.factory.guzzle6'
      config:
        timeout: 3
       plugins:
        - add_host:
            host: '%mab05k_oanda_client.hostname%'
            replace: true
        - add_path:
            path: '%mab05k_oanda_client.path_prefix%'
        - header_defaults:
            headers:
              Content-Type: 'application/json'

```

We also set a default DateTime format for JMS Serializer to match the DateTime formatting from Oanda
```yaml
# This is an example, and does not need to be manually added to your configuration files
jms_serializer:
  handlers:
    datetime:
      default_format: 'Y-m-d\TH:i:s.u???\Z'

```

## Authentication
The Oanda Client Bundle handles sending the Authorization headers for you based on your configuration. By default,
it will use the first account in your configuration. If you are using multiple accounts, you must follow the documentation
in the [Multiple Accounts](src/Bridge/Symfony/Bundle/Resources/doc/usage/multiple_accounts.md) section.

## Usage
* [Multiple Accounts](src/Bridge/Symfony/Bundle/Resources/doc/usage/multiple_accounts.md)
* [Exceptions](src/Bridge/Symfony/Bundle/Resources/doc/usage/exceptions.md)

Use Dependency Injection to inject the Clients into your Service

```php
<?php

namespace App\Service;

use Mab05k\OandaClient\Client\AccountClient;

class OandaAccountService
{
    /**
     * @var AccountClient
     */
    private $accountClient;
    
    public function __construct(AccountClient $accountClient) 
    {
        $this->accountClient = $accountClient;
    }
    
    public function doSomethingWithAccount()
    {
        $account = $this->accountClient->account();
        // do something and return the result...
    }
}
```

#### Clients

* [AccountClient](src/Client/AccountClient.php)
* [InstrumentClient](src/Client/InstrumentClient.php)
* [OrderClient](src/Client/OrderClient.php)
* [PositionClient](src/Client/PositionClient.php)
* [PricingClient](src/Client/PricingClient.php)
* [TradeClient](src/Client/TradeClient.php)
* [TransactionClient](src/Client/TransactionClient.php)
