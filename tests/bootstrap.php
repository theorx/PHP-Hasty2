<?php


require __DIR__ . '/../vendor/autoload.php';

$configuration = include(__DIR__ . '/../config/configuration.php');
Hasty2\Config\Config::load($configuration);