<?php

// Needed to get styleci-bridge loaded
require_once __DIR__.'/vendor/autoload.php';

use SLLH\StyleCIBridge\ConfigBridge;

return ConfigBridge::create()
    ->setUsingCache(true)
;

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('admin/help')
    ->exclude('admin/info')
    ->exclude('public_html/texts')
    ->exclude('admin/ui')
    ->exclude('admin/locale')
    ->exclude('admin/PHPMailer')
    ->in(__DIR__)
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
//    ->level(Symfony\CS\FixerInterface::PSR0_LEVEL)
//    ->level(Symfony\CS\FixerInterface::NONE_LEVEL)
    ->fixers(array('trailing_spaces', 'encoding'))
    ->fixers(array('-psr2'))
    ->finder($finder)
;
