<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class temporary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:temporary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Temporary command for testing purposes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Your command logic here
        $this->info('Temporary command executed successfully.');
    }
}
