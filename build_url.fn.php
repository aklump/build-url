<?php
// SPDX-License-Identifier: BSD-3-Clause

/**
 * Create an URL from the array returned by parse_url().
 *
 * @param array $components
 *
 * @return string
 *
 * @throws \InvalidArgumentException If the components cannot be used to
 * construct an URL.
 * @see \parse_url()
 *
 */
function build_url(array $components): string {
  $scheme = $components['scheme'] ?? 'https';
  $host = $components['host'] ?? '';
  $path = $components['path'] ?? '';

  // Credentialed URL
  if (!empty($components['user']) && !empty($components['pass'])) {
    return sprintf('%s://%s:%s@%s%s', $scheme, $components['user'], $components['pass'], $host, $path);
  }

  return sprintf('%s://%s%s', $scheme, $host, $path);
}
