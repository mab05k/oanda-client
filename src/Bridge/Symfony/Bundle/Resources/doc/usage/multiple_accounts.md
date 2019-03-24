# Using Multiple Accounts

This bundle supports working with multiple Oanda Accounts. By default, the bundle will always select the first account
in your configuration array. 

In this example, the account named `primary_account` will always be used by default.
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

In order to use multiple accounts, you must set your account before each Client call.

```php
<?php

namespace App;

use Mab05k\OandaClient\Client\AccountClient;

class MyOandaClass
{
    private $accountClient;
    
    public function __construct(AccountClient $accountClient) 
    {
        $this->accountClient = $accountClient;
    }
    
    public function getAccountInfo()
    {
        // You can pass in the Account Name, or Account Id to set the account,
        // You can also create a new Account object and pass that in directly
        // $accountClient->setAccount(new Account('name', 'id', 'secret'));
        $accountClient->setAccount('secondary_account');
        return $accountClient->account();
    }
}
```