<?php

declare(strict_types=1);

namespace Jascha030\DI\Helpers;

/**
 * Scan the ./definitions directory for definition files.
 *
 * @noinspection PhpUnnecessaryLocalVariableInspection
 */
function getDefinitions(?string ...$dirs): \Generator
{
    foreach ($dirs as $dir) {
        if (! is_dir($dir)) {
            throw new \InvalidArgumentException('Directory');
        }

        $files = \array_diff(\scandir($dir), ['..', '.']);

        foreach ($files as $file) {
            if (! str_ends_with($file, '.php')) {
                continue;
            }

            $basename = \str_replace('.php', '', $file);

            yield $basename => "{$dir}/{$file}";
        }
    }
}
