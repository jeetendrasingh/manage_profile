<?php

/**
 * @file
 * Contains \Drupal\config_update\Tests\ConfigUpdateTest.
 */

namespace Drupal\config_update\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Verify the config revert report and its links.
 *
 * @group config
 */
class ConfigUpdateTest extends WebTestBase {

  /**
   * Modules to enable.
   *
   * Use the Search module because it has two included config items in its
   * config/install, assuming node and user are also enabled.
   *
   * @var array.
   */
  public static $modules = array('config', 'config_update', 'search', 'node', 'user', 'block');

  /**
   * The admin user that will be created.
   */
  protected $adminUser;

  protected function setUp() {
    parent::setUp();

    // Create user and log in.
    $this->adminUser = $this->drupalCreateUser(array('access administration pages', 'administer search', 'view config updates report', 'synchronize configuration', 'export configuration', 'import configuration', 'revert configuration'));
    $this->drupalLogin($this->adminUser);

    // Make sure local tasks and page title are showing.
    $this->drupalPlaceBlock('local_tasks_block');
    $this->drupalPlaceBlock('page_title_block');
  }

  /**
   * Tests the config report and its linked pages.
   */
  public function testConfigReport() {
    // Test links to report page.
    $this->drupalGet('admin/config/development/configuration');
    $this->clickLink('Updates report');
    $this->assertNoReport();

    // Verify some empty reports.
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->assertReport('Search page', array(), array(), array(), array());
    // Module, theme, and profile reports have no 'added' section.
    $this->drupalGet('admin/config/development/configuration/report/module/search');
    $this->assertReport('Search module', array(), array(), array(), array(), array('added'));
    $this->drupalGet('admin/config/development/configuration/report/theme/classy');
    $this->assertReport('Classy theme', array(), array(), array(), array(), array('added'));

    $inactive = array('locale.settings' => 'Simple configuration');
    $this->drupalGet('admin/config/development/configuration/report/profile');
    $this->assertReport('Testing profile', array(), array(), array(), $inactive, array('added'));

    // Delete the user search page from the search UI and verify report for
    // both the search page config type and user module.
    $this->drupalGet('admin/config/search/pages');
    $this->clickLink('Delete');
    $this->drupalPostForm(NULL, array(), 'Delete');
    $inactive = array('search.page.user_search' => 'Users');
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->assertReport('Search page', array(), array(), array(), $inactive);
    $this->drupalGet('admin/config/development/configuration/report/module/user');
    $this->assertReport('User module', array(), array(), array(), $inactive, array('added', 'changed'));

    // Use the import link to get it back. Do this from the search page
    // report to make sure we are importing the right config.
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->clickLink('Import from source');
    $this->assertText('The configuration was imported');
    $this->assertNoReport();
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->assertReport('Search page', array(), array(), array(), array());

    // Edit the node search page from the search UI and verify report.
    $this->drupalGet('admin/config/search/pages');
    $this->clickLink('Edit');
    $this->drupalPostForm(NULL, array(
        'label' => 'New label',
        'path' => 'new_path',
      ), 'Save search page');
    $changed = array('search.page.node_search' => 'New label');
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->assertReport('Search page', array(), array(), $changed, array());

    // Test the show differences link.
    $this->clickLink('Show differences');
    $this->assertText('Content');
    $this->assertText('New label');
    $this->assertText('node');
    $this->assertText('new_path');

    // Test the Back link.
    $this->clickLink("Back to 'Updates report' page.");
    $this->assertNoReport();

    // Test the export link.
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->clickLink('Export');
    $this->assertText('Here is your configuration:');
    $this->assertText('id: node_search');
    $this->assertText('New label');
    $this->assertText('path: new_path');
    $this->assertText('search.page.node_search.yml');

    // Test reverting.
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->clickLink('Revert to source');
    $this->assertText('Are you sure you want to revert');
    $this->assertText('Search page');
    $this->assertText('node_search');
    $this->assertText('Customizations will be lost. This action cannot be undone');
    $this->drupalPostForm(NULL, array(), 'Revert');
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $this->assertReport('Search page', array(), array(), array(), array());

    // Add a new search page from the search UI and verify report.
    $this->drupalPostForm('admin/config/search/pages', array(
        'search_type' => 'node_search',
      ), 'Add new page');
    $this->drupalPostForm(NULL, array(
        'label' => 'test',
        'id' => 'test',
        'path' => 'test',
      ), 'Add search page');
    $this->drupalGet('admin/config/development/configuration/report/type/search_page');
    $added = array('search.page.test' => 'test');
    $this->assertReport('Search page', array(), $added, array(), array());

    // Test the export link.
    $this->clickLink('Export');
    $this->assertText('Here is your configuration:');
    $this->assertText('id: test');
    $this->assertText('label: test');
    $this->assertText('path: test');
    $this->assertText('search.page.test.yml');

    // Change the search module config and verify the actions work for
    // simple config.
    $this->drupalPostForm('admin/config/search/pages', array(
        'minimum_word_size' => 4,
      ), 'Save configuration');
    $changed = array('search.settings' => 'search.settings');
    $this->drupalGet('admin/config/development/configuration/report/module/search');
    $this->assertReport('Search module', array(), array(), $changed, array(), array('added'));

    $this->clickLink('Show differences');
    $this->assertText('Config difference for Simple configuration search.settings');
    $this->assertText('index::minimum_word_size');
    $this->assertText('4');

    $this->drupalGet('admin/config/development/configuration/report/module/search');
    $this->clickLink('Export');
    $this->assertText('minimum_word_size: 4');

    $this->drupalGet('admin/config/development/configuration/report/module/search');
    $this->clickLink('Revert to source');
    $this->drupalPostForm(NULL, array(), 'Revert');

    $this->drupalGet('admin/config/development/configuration/report/module/search');
    $this->assertReport('Search module', array(), array(), array(), array(), array('added'));
  }

  /**
   * Asserts that the report page has the correct content.
   *
   * Assumes you are already on the report page.
   *
   * @param string $title
   *   Report title to check for.
   * @param string[] $missing
   *   Array of items that should be listed as missing, name => label.
   * @param string[] $added
   *   Array of items that should be listed as missing, name => label.
   * @param string[] $changed
   *   Array of items that should be listed as changed, name => label.
   * @param string[] $inactive
   *   Array of items that should be listed as inactive, name => label.
   * @param string[] $skip
   *   Array of report sections to skip checking.
   */
  protected function assertReport($title, $missing, $added, $changed, $inactive, $skip = array()) {
    $this->assertText('Configuration updates report for ' . $title);
    $this->assertText('Generate new report');

    if (!in_array('missing', $skip)) {
      $this->assertText('Missing configuration items');
      if (count($missing)) {
        foreach ($missing as $name => $label) {
          $this->assertText($name);
          $this->assertText($label);
        }
        $this->assertNoText('None: all provided configuration items are in your active configuration.');
      }
      else {
        $this->assertText('None: all provided configuration items are in your active configuration.');
      }
    }

    if (!in_array('inactive', $skip)) {
      $this->assertText('Inactive optional items');
      if (count($inactive)) {
        foreach ($inactive as $name => $label) {
          $this->assertText($name);
          $this->assertText($label);
        }
        $this->assertNoText('None: all optional configuration items are in your active configuration.');
      }
      else {
        $this->assertText('None: all optional configuration items are in your active configuration.');
      }
    }

    if (!in_array('added', $skip)) {
      $this->assertText('Added configuration items');
      if (count($added)) {
        foreach ($added as $name => $label) {
          $this->assertText($name);
          $this->assertText($label);
        }
        $this->assertNoText('None: all active configuration items of this type were provided by modules, themes, or install profile.');
      }
      else {
        $this->assertText('None: all active configuration items of this type were provided by modules, themes, or install profile.');
      }
    }

    if (!in_array('changed', $skip)) {
      $this->assertText('Changed configuration items');
      if (count($changed)) {
        foreach ($changed as $name => $label) {
          $this->assertText($name);
          $this->assertText($label);
        }
        $this->assertNoText('None: no active configuration items differ from their current provided versions.');
      }
      else {
        $this->assertText('None: no active configuration items differ from their current provided versions.');
      }
    }
  }

  /**
   * Asserts that the report is not shown.
   *
   * Assumes you are already on the report form page.
   */
  protected function assertNoReport() {
    $this->assertText('Report type');
    $this->assertText('Configuration type');
    $this->assertText('Module');
    $this->assertText('Theme');
    $this->assertText('Installation profile');
    $this->assertText('Updates report');
    $this->assertNoText('Missing configuration items');
    $this->assertNoText('Added configuration items');
    $this->assertNoText('Changed configuration items');
    $this->assertNoText('Unchanged configuration items');
  }
}
