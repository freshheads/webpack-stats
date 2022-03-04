<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('.tools')
    ->exclude('vendor')
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.php_cs.cache')
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setRules([
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'compact_nullable_typehint' => true,
        'global_namespace_import' => true,
        'list_syntax' => ['syntax' => 'short'],
        'mb_str_functions' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'php_unit_strict' => true,
        'phpdoc_order' => true,
        'static_lambda' => true,
        'strict_comparison' => true,
        'strict_param' => true,
    ])
;
