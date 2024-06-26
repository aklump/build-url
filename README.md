# `build_url()` PHP function

![build_url](images/build_url.jpg)

Provides a function to create string versions of arrays containing URL components, such as returned by the native `parse_url` function.

## Install with Composer

1. Require this package:
   
    ```
    composer require aklump/build-url:^0.0
    ```

## Usage

```php
$components = [
  'scheme' => 'https',
  'host': 'foobar.com',
  'path': '/index.html'
];
$url = build_url($components);
// 'https://foobar.com/index.html' === $url
```
