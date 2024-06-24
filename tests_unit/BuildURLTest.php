<?php

namespace AKlump\LiveDevPorter\Tests\Helpers;

use PHPUnit\Framework\TestCase;

/**
 * @covers \build_url()
 */
class BuildURLTest extends TestCase {

  public function dataForProvider() {
    $tests = [];
    $tests[] = [
      'https://stackoverflow.com/questions/37906058/combine-url-parts-in-php',
    ];
    $tests[] = [
      'mysql://drupal8:drupal8@database--develop/drupal8',
    ];

    return $tests;
  }

  /**
   * @dataProvider dataForProvider
   */
  public function testInvoke(string $url) {
    $parts = parse_url($url);
    $this->assertSame($url, build_url($parts));
  }

}
