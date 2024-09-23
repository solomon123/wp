<?php

declare(strict_types=1);

namespace Drupal\Tests\drupaleasy_repositories\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Test description.
 *
 * @group drupaleasy_repositories
 */
final class AddYmlRepoTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   *
   * Module required to be enabled for this test to work.
   */
  protected static $modules = ['drupaleasy_repositories'];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // Set up the test here.
  }

  /**
   * Test callback.
   *
   * @test
   */
  public function testSomething(): void {
    $admin_user = $this->drupalCreateUser(['administer site configuration']);
    $this->drupalLogin($admin_user);
    $this->drupalGet('/admin/config/system/site-information');
    $this->assertSession()->elementExists('xpath', '//h1[text() = "Basic site settings"]');
  }

}
