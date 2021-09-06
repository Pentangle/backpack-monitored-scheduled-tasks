<?php

namespace Pentangle\BackpackMonitoredScheduledTasks;

class AddonServiceProvider extends \Illuminate\Support\ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'Pentangle';
    protected $packageName = 'backpack-monitored-scheduled-tasks';
    protected $commands = [];
}
