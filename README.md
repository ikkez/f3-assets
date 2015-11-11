# Sugar Assets Demo App
To init the demo within [bcosca/fatfree-dev](https://github.com/bcosca/fatfree/tree/dev), add:

```php
$f3->concat('AUTOLOAD',',Assets/src/lib/');
$f3->concat('AUTOLOAD',',Assets/demo/');
\AssetsApp::init();
```

