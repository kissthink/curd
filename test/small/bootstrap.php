<?php
$basedir = __DIR__ . '/../../';
require_once $basedir . 'SplClassLoader.php';

$classLoader = new SplClassLoader('Org\\Plista\\Curd', $basedir);
$classLoader->register();
