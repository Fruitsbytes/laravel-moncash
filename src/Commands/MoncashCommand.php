<?php

namespace FruitsBytes\Laravel\MonCash\Commands;

use Illuminate\Console\Command;

class MoncashCommand extends Command
{
    public $signature = 'mon-cash';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
