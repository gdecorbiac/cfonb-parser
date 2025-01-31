<?php

$header = <<<'EOF'
This file is part of the CFONB Parser package.

(c) Guillaume Sainthillier <hello@silarhi.fr>
(c) @fezfez <demonchaux.stephane@gmail.com>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests');

$config = new PhpCsFixer\Config();
return $config
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@DoctrineAnnotation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'phpdoc_summary' => false,
        'no_superfluous_phpdoc_tags' => true,
        'header_comment' => ['header' => $header],
        'concat_space' => ['spacing' => 'one'],
        'native_constant_invocation' => true,
        'native_function_invocation' => ['include' => ['@compiler_optimized']],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'global_namespace_import' => ['import_functions' => true],
        'declare_strict_types' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
