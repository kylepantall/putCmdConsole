<?php
namespace App\Parser;

use App\Parser\Objects\ParsedObject;

class Engine
{
    const BASIC_PLACEHOLDERS_RE = '';

    public static function parse(string $stencil, array $parameters) : ParsedObject {
        $calculatedStencil = self::replaceBasicPlaceholders($stencil, $parameters);
        return new ParsedObject($stencil, $calculatedStencil, $parameters);
    }

    private static function replaceBasicPlaceholders(string $stencil, array $parameters) : string {
        $paramsWithValues = self::getParametersWithValues($parameters);
        $tmpStencil = $stencil;

        foreach ($paramsWithValues as $key => $value) {
            $tmpStencil = preg_replace('/\$\:'.$key.'/m', $value, $tmpStencil);
        }

        return $tmpStencil;
    }

    private static function getParametersWithValues(array $parameters) : array {
        return Collect($parameters)->mapWithKeys(
            function ($item) {
                $csv = str_getcsv($item,'=');
                return [$csv[0] => $csv[1]];
            }
        )->toArray();
    }

    private static function getAllBasicPlaceholders(string $stencil) {
        preg_match_all(self::BASIC_PLACEHOLDERS_RE, $stencil, $matches);
        return  $matches;
    }
}
