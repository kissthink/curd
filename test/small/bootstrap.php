<?php
$basedir = __DIR__ . '/../../';
require_once $basedir . 'SplClassLoader.php';

$classLoader = new SplClassLoader('Org\\Plista\\Curd', $basedir);
$classLoader->register();

$classLoader = new SplClassLoader('Respect\\Validation', "$basedir/Validation/library/");
$classLoader->register();

