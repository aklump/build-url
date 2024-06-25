<!--
id: readme
tags: ''
-->

# `build_url()` PHP function

Provides a function to create string versions of arrays containing URL components, such as returned by the native `parse_url` function.

{{ composer.install|raw }}

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
