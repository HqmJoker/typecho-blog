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

$dbHost = $_SERVER['MYSQLHOST'] ?? 'localhost';
$dbPort = $_SERVER['MYSQLPORT'] ?? 3306;
$dbUser = $_SERVER['MYSQLUSER'] ?? '';
$dbPassword = $_SERVER['MYSQLPASSWORD'] ?? '';
$dbDatabase = $_SERVER['MYSQLDATABASE'] ?? 'typecho';

$db->addServer(array (
  'host' => $dbHost,
  'port' => $dbPort,
  'user' => $dbUser,
  'password' => $dbPassword,
  'charset' => 'utf8mb4',
  'database' => $dbDatabase,
  'engine' => 'InnoDB',
  'sslCa' => '',
  'sslVerify' => true,
), \Typecho\Db::READ | \Typecho\Db::WRITE);
\Typecho\Db::set($db);

