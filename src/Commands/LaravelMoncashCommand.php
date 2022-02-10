<?php

namespace Fruitsbytes\LaravelMoncash\Commands;

use Illuminate\Console\Command;

class LaravelMoncashCommand extends Command
{
    public $signature = 'laravel-moncash';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
