<?php

namespace Pentangle\BackpackMonitoredScheduledTasks\Commands;

use Illuminate\Console\Command;

class BackpackMonitoredScheduledTasksCommand extends Command
{
    public $signature = 'skeleton';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
