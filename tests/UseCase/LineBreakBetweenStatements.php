<?php

namespace tests\UseCase;

use PedroTroller\CS\Fixer\CodingStyle\LineBreakBetweenStatementsFixer;
use tests\UseCase;

class LineBreakBetweenStatements implements UseCase
{
    /**
     * {@inheritdoc}
     */
    public function getFixer()
    {
        return new LineBreakBetweenStatementsFixer();
    }

    /**
     * {@inheritdoc}
     */
    public function getRawScript()
    {
        return '
<?php
class TheClass
{
    public function theFunction()
    {
        do {
            //yolo
        } while (true);
        if (true) {
            return;
        }
        foreach ([] as $nothing) {
            continue;
        }
        while($forever = true) {
        }
    }
}';
    }

    /**
     * {@inheritdoc}
     */
    public function getExpectation()
    {
        return '
<?php
class TheClass
{
    public function theFunction()
    {
        do {
            //yolo
        } while (true);

        if (true) {
            return;
        }

        foreach ([] as $nothing) {
            continue;
        }

        while($forever = true) {
        }
    }
}';
    }

    /**
     * {@inheritdoc}
     */
    public function getMinSupportedPhpVersion()
    {
        return 0;
    }
}
