<?php
// 修复路径解析问题
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH);
$file = __DIR__ . '/..' . $path;

if (file_exists($file) && !is_dir($file)) {
    return false;
} else {
    require_once __DIR__ . '/../index.php';
}