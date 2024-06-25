<?php

namespace AKlump\LiveDevPorter\Tests\Helpers;

use PHPUnit\Framework\TestCase;

/**
 * @covers \build_url()
 */
class BuildURLTest extends TestCase {

  public function dataForProvider() {
    $tests = [];
    $tests[] = ['https://stackoverflow.com/questions/37906058/combine-url-parts-in-php'];
    $tests[] = ['mysql://drupal8:drupal8@database--develop/drupal8'];
    $tests[] = ['https://github.com/aklump/build-url/security?foo=bar'];
    $tests[] = ['mysql://drupal8:rock$ol1D@localhost:3306/drupal8'];

    return $tests;
  }

  /**
   * @dataProvider dataForProvider
   */
  public function testParseThenBuildAsExpected(string $url) {
    $parts = parse_url($url);
    $this->assertSame($url, build_url($parts));
  }

  public function dataFortestBuildFromArraysProvider() {
    $tests = [];
    $tests[] = [
      ['host' => 'lorem.com'],
      'https://lorem.com',
    ];
    $tests[] = [
      ['host' => 'lorem.com', 'path' => 'page1.html'],
      'https://lorem.com/page1.html',
    ];
    $tests[] = [
      ['host' => 'lorem.com', 'user' => 'admin'],
      'https://admin:PASSWORD@lorem.com',
    ];


    return $tests;
  }

  /**
   * @dataProvider dataFortestBuildFromArraysProvider
   */
  public function testBuildFromArrays(array $components, string $expected) {
    $this->assertSame($expected, build_url($components));
  }

  public function testEmptyArrayThrows() {
    $this->expectException(\InvalidArgumentException::class);
    build_url([]);
  }

}
