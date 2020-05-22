<?php

namespace App\Parser\Command;

use App\Parser\Collections\Stack;

class CommandParser
{
    const DEFAULT_COMMAND = 'join(\':\', $:FIRST, $:SECOND)';

    public static function parse(string $command = self::DEFAULT_COMMAND)
    {
        $encounteredCommand = false;
        $encounteredString = false;
        $encounteredStartOfParameter = false;
        $encounteredEndOfParameter = false;
        $encounteredVariable = false;

        $stack = new Stack(0);

        $charArray = str_split($command);

        for ($i = 0; $i < count($charArray); $i++) {
            $currentChar = $charArray[$i];
            $nextChar = null;

            if ($i + 1 < count($charArray)) {
                $nextChar = $charArray[$i + 1];
            }


            if ($currentChar == '$' && !$encounteredString) {
                $encounteredCommand = true;
            }
        }
    }
}
