<?php

declare(strict_types=1);

namespace App;

use RuntimeException;

class FileReader
{

    /**
     * Reads an expression from a file.
     *
     * @param string $path The file path.
     * @return string[] The expression contained in the file.
     * @throws RuntimeException if the file cannot be read or is empty.
     */
    public function readExpression(string $path): array {
        if (!file_exists($path) || !is_readable($path)) {
            throw new RuntimeException("File not found or unreadable: $path");
        }

        $content = file_get_contents($path);
        if ($content === false || trim($content) === '') {
            throw new RuntimeException("File is empty or cannot be read: $path");
        }

        // Split the expression into tokens
        return preg_split('/\s+/', trim($content)) ?: [];
    }
}