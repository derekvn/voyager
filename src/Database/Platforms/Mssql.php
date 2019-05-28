<?php

namespace TCG\Voyager\Database\Platforms;

use Illuminate\Support\Collection;
use TCG\Voyager\Database\Types\Type;

abstract class Mssql extends Platform
{
    public static function getTypes(Collection $typeMapping)
    {
        $typeMapping->forget([
            'real',    // same as double
            'int',     // same as integer
            'string',  // same as varchar
            'numeric', // same as decimal
        ]);

        return $typeMapping;
    }

    public static function registerCustomTypeOptions()
    {
        // Disable Default for unsupported types
        Type::registerCustomOption('default', [
            'disabled' => true,
        ], '*text');
        Type::registerCustomOption('default', [
            'disabled' => true,
        ], '*blob');
        Type::registerCustomOption('default', [
            'disabled' => true,
        ], 'json');
    }
}
