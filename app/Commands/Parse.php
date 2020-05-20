<?php

namespace App\Commands;

use App\Parser\Engine;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use LaravelZero\Framework\Commands\Command;

class Parse extends Command
{
    protected $signature = 'parse {stencil} {parameters*}';

    protected $description = 'Parse a given stencil with provided paramaters.';

    public function handle() : void
    {
       $paramters = $this->argument('parameters');
       $stencil = $this->argument('stencil');

       if (File::exists($stencil)) {
           $stencil = file_get_contents($stencil);
       }

       $parsedObject = Engine::parse(
           $stencil,
           $paramters
        );

        $this->output->text($parsedObject);
    }
}
