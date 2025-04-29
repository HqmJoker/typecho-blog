<?php
// site root path
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

// plugin directory (relative path)
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

// theme directory (relative path)
define('__TYPECHO_THEME_DIR__', '/usr/themes');

// admin directory (relative path)
define('__TYPECHO_ADMIN_DIR__', '/admin/');

// register autoload
require_once __TYPECHO_ROOT_DIR__ . '/var/Typecho/Common.php';

// init
\Typecho\Common::init();

// config db
$db = new \Typecho\Db('Mysqli', 'typecho_');
$db->addServer(array (
  'host' => getenv('MYSQL_HOST'),
  'user' => getenv('MYSQL_USERNAME'),
  'password' => getenv('MYSQL_PASSWORD'),
  'database' => getenv('MYSQL_DATABASE'),
  'port' => getenv('MYSQL_PORT'),
  'charset' => 'utf8mb4',
  'engine' => 'InnoDB',
  'sslCa' => '',
  'sslVerify' => false,
), \Typecho\Db::READ | \Typecho\Db::WRITE);
\Typecho\Db::set($db);
