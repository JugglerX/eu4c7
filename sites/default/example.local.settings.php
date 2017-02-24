<?php
/**
 * @file
 * Local development database settings. Great for MAMP, XAMP, etc. in /private.
 */
if (!defined('PANTHEON_ENVIRONMENT')) {
  // Database.
  $databases['default']['default'] = array(
    'database' => 'eu4c7',
    'username' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'driver' => 'mysql',
    'port' => '',
    'prefix' => '',
  );
}