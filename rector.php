<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/lang',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/storage',
        __DIR__.'/tests',
    ]);

    // register a single rule
    $rectorConfig->rules([
        Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector::class,
        Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector::class,
        Rector\CodingStyle\Rector\Ternary\TernaryConditionVariableAssignmentRector::class,
        Rector\CodingStyle\Rector\Encapsed\WrapEncapsedVariableInCurlyBracesRector::class,
        Rector\DeadCode\Rector\Cast\RecastingRemovalRector::class,
        Rector\DeadCode\Rector\If_\RemoveAlwaysTrueIfConditionRector::class,
        Rector\DeadCode\Rector\Return_\RemoveDeadConditionAboveReturnRector::class,
        Rector\DeadCode\Rector\StmtsAwareInterface\RemoveJustPropertyFetchForAssignRector::class,
        Rector\DeadCode\Rector\Ternary\TernaryToBooleanOrFalseToBooleanAndRector::class,
        Rector\EarlyReturn\Rector\If_\ChangeIfElseValueAssignToEarlyReturnRector::class,
        Rector\Naming\Rector\Foreach_\RenameForeachValueVariableToMatchExprVariableRector::class,
        Rector\CodeQuality\Rector\Ternary\ArrayKeyExistsTernaryThenValueToCoalescingRector::class,
        Rector\CodeQuality\Rector\If_\SimplifyIfElseToTernaryRector::class,
    ]);

    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_81,
        //    SetList::CODE_QUALITY,
        //    LaravelSetList::LARAVEL_90
    ]);
};
