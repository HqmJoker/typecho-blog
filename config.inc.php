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

// 从环境变量获取数据库配置，如果环境变量不存在则使用默认值
$dbHost = getenv('MYSQLHOST') !== false ? getenv('MYSQLHOST') : (defined('MYSQLHOST') ? MYSQLHOST : 'localhost');
$dbPort = getenv('MYSQLPORT') !== false ? getenv('MYSQLPORT') : (defined('MYSQLPORT') ? MYSQLPORT : 3306);
$dbUser = getenv('MYSQLUSER') !== false ? getenv('MYSQLUSER') : (defined('MYSQLUSER') ? MYSQLUSER : 'root');
$dbPassword = getenv('MYSQLPASSWORD') !== false ? getenv('MYSQLPASSWORD') : (defined('MYSQLPASSWORD') ? MYSQLPASSWORD : '');
$dbDatabase = getenv('MYSQLDATABASE') !== false ? getenv('MYSQLDATABASE') : (defined('MYSQLDATABASE') ? MYSQLDATABASE : 'typecho');

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

