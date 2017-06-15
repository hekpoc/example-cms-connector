Installation
==============================

Require the bundle in your composer.json file:

```json
{
    "require": {
        "wiseweb/social-engine-adapter-bundle": "~1.0"
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
            new WiseWeb\SocialEngineAdapterBundle\WiseWebSocialEngineAdapterBundle()
            ...
        ];
    }
```

Usage
------

``` php
$response = $this->container->get('wiseweb_posting.social_engine.adapter')->processRequest($request);
```
