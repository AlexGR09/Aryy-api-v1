<?php

$finder = PhpCsFixer\Finder::create()
    // ->in(__DIR__).
	->in(dirname(__DIR__).'/../*');
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
	->setRiskyAllowed(true)
;