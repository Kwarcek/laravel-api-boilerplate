<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    protected $signature = 'app:deploy';

    protected $description = 'Command description';

    public function handle(): int
    {
        $this->info('The application is being deployed, wait until the process is complete');

        $this->info('Database migration');
        $this->call('migrate', ['--force' => true]);

        $this->info('Database seeders');
        $this->call('db:seed', ['--force' => true]);

        $this->info('Publish horizon stubs');
        $this->call('horizon:publish');

        $this->info('The application has been deployed.');
        return Command::SUCCESS;
    }
}
