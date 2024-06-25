<?php
// SPDX-License-Identifier: BSD-3-Clause

/**
 * Create an URL from components such as returned by parse_url().
 *
 * @param array $components
 *
 * @return string
 *
 * @throws \InvalidArgumentException If the components cannot be used to
 * construct an URL.
 * @see \parse_url()
 */
function build_url(array $components): string {
  $default_scheme = 'https';
  $scheme = $components['scheme'] ?? $default_scheme;
  $host = $components['host'] ?? '';
  if(!empty($components['port'])) {
    $host .= ':'.$components['port'];
  }
  $path = $components['path'] ?? '';
  if ($path) {
    $path = '/' . ltrim($path, '/');
  }

  // Credentialed URL
  if (!empty($components['user'])) {
    $pass = $components['pass'] ?? '';
    $pass = $pass ?: 'PASSWORD';

    return sprintf('%s://%s:%s@%s%s', $scheme, $components['user'], $pass, $host, $path);
  }

  $url = sprintf('%s://%s%s', $scheme, $host, $path);
  if (!empty($components['query'])) {
    $url .= '?' . $components['query'];
  }

  if (empty($components['scheme']) && "$default_scheme://" === $url) {
    throw new InvalidArgumentException('$components cannot be understood so as to build URL.');
  }

  return $url;
}
