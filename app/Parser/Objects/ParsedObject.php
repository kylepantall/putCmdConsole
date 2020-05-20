<?php

namespace App\Parser\Objects;

class ParsedObject {

    private array $parameters = [];
    private string $stencil = '';
    private string $finalStencil = '';

    function __construct(string $stencil, string $finalStencil, array $parameters = [])
    {
        $this->stencil = $stencil;
        $this->parameters = $parameters;
        $this->finalStencil = $finalStencil;
    }

    function getParameters() : array {
        return $this->parameters;
    }

    function getStencil() : string {
        return $this->stencil;
    }

    public function __toString()
    {
        return $this->finalStencil;
    }
}
