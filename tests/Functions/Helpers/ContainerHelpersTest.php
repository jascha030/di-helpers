<?php

declare(strict_types=1);

namespace Jascha030\DI\Tests\Functions\Helpers;

use PHPUnit\Framework\TestCase;
use function Jascha030\DI\Helpers\getDefinitions;

/**
 * @internal
 * @coversNothing
 */
final class ContainerHelpersTest extends TestCase
{
    public function testGetDefinitions(): void
    {
        $definitionsDir = dirname(__FILE__, 3) . '/Fixtures/definitions/';

        foreach (getDefinitions($definitionsDir) as $definition) {
            $this->assertFileExists($definition);
        }
    }
}
