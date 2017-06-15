Installation
==============================

Require the bundle in your composer.json file:

```json
{
    "require": {
        "wiseweb/cms-connector-bundle": "~1.0"
    }
}
```    

Register the bundle:

``` php
// app/AppKernel.php
public function registerBundles()
    {
        $bundles = [
            ...
            new WiseWeb\CmsConnectorBundle\WiseWebCmsConnectorBundle()
            ...
        ];
    }
```
