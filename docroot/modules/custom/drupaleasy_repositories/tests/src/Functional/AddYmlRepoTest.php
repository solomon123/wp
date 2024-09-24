<?php

declare(strict_types=1);

namespace Drupal\Tests\drupaleasy_repositories\Functional;

use Drupal\drupaleasy_repositories\Traits\RepositoryContentTypeTrait;
use Drupal\Tests\BrowserTestBase;

/**
 * Test description.
 *
 * @group drupaleasy_repositories
 */
final class AddYmlRepoTest extends BrowserTestBase {
  use RepositoryContentTypeTrait;
  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   *
   * Module required to be enabled for this test to work.
   */
  protected static $modules = [
    'drupaleasy_repositories',
    'user',
    'link',
    'node',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // Set up the test here.
    $config = $this->config('drupaleasy_repositories.settings');
    $config->set('repositories_plugin', ['yml_remote' => 'yml_remote']);
    $config->save();

    // The first user created in the test (either in setUp()
    // or a test method) will have UID=2.
    // This is because the setUp() method of
    // BrowserTestBase creates the UID=1 user.
    // The UID=1 user can be accessed from.
    // Inside our test class via $this->rootUser.
    $admin_user = $this->drupalCreateUser(['configure drupaleasy repositories']);
    $this->drupalLogin($admin_user);

    // The add content type and URL field function commented
    // Because we are going to create content type using config.
    // Add content type.
    // $this->createRepositoryContentType();

    // Add URL field to user entity.
    // $this->createUserRepositoryUrlField();
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
