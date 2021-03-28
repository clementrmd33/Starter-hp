<?php
namespace Tests\Framework;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

  public function testRedirectTrailingSlash() {
    $app = new App();
    $request = new ServerRequest('GET', '/demoslash/');
    $reponse = $app->run($request);
    $this->assertContains('/demoslash', $reponse->getHeader('Location'));
    $this->assertEquals(301, $reponse->getStatusCode());
  }
}