<?php

namespace App\Parser\Objects;

class CommandObject
{
    private $paramters = [];
    private $closed = false;
    private $func = '';

    function __construct()
    {

    }

    function setFunction(string $func) {
        $this->func = $func;
    }

    /**
     * @param CommandObject|string|int $param
     * @return void
     */
    function addParameter($param) {
        array_push($this->paramters, $param);
    }

    function isClosed() : bool {
        $objects = array_filter($this->paramters, function ($item) {
            if ($item instanceof CommandObject) {
                return !$item->isClosed();
            }

            return false;
        });

        return !empty($objects) && $this->closed;
    }

    function getParameters() : array {
        return $this->paramters;
    }

    function getFunction() : string {
        return $this->func;
    }

}
