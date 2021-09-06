# This is my package backpack-monitored-scheduled-tasks

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pentangle/backpack-monitored-scheduled-tasks.svg?style=flat-square)](https://packagist.org/packages/pentangle/backpack-monitored-scheduled-tasks)

[comment]: <> ([![GitHub Tests Action Status]&#40;https://img.shields.io/github/workflow/status/pentangle/backpack-monitored-scheduled-tasks/run-tests?label=tests&#41;]&#40;https://github.com/pentangle/backpack-monitored-scheduled-tasks/actions?query=workflow%3Arun-tests+branch%3Amain&#41;)

[comment]: <> ([![GitHub Code Style Action Status]&#40;https://img.shields.io/github/workflow/status/pentangle/backpack-monitored-scheduled-tasks/Check%20&%20fix%20styling?label=code%20style&#41;]&#40;https://github.com/pentangle/backpack-monitored-scheduled-tasks/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain&#41;)
[![Total Downloads](https://img.shields.io/packagist/dt/pentangle/backpack-monitored-scheduled-tasks.svg?style=flat-square)](https://packagist.org/packages/pentangle/backpack-monitored-scheduled-tasks)

---

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/backpack-monitored-scheduled-tasks.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/backpack-monitored-scheduled-tasks)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require pentangle/backpack-monitored-scheduled-tasks
```

Add menu item to sidebar:

```bash
php artisan backpack:add-sidebar-content "<li class='nav-item'><a class='nav-link' href='{{ backpack_url('monitored-scheduled-task') }}'><i class='nav-icon la la-tachometer'></i> Monitored scheduled tasks</a></li>"
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Spatie\ScheduleMonitor\ScheduleMonitorServiceProvider" --tag="schedule-monitor-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Pentangle\BackpackMonitoredScheduledTasks\AddonServiceProvider" --tag="backpack-monitored-scheduled-tasks-config"
```

This is the contents of the published config file:

```php
return [
    /*
     * The schedule monitor will log each start, finish and failure of all scheduled jobs.
     * After a while the `monitored_scheduled_task_log_items` might become big.
     * Here you can specify the amount of days log items should be kept.
     */
    'delete_log_items_older_than_days' => 30,

    /*
     * The date format used for all dates displayed on the output of commands
     * provided by this package.
     */
    'date_format' => 'd-m-Y H:i:s',

    'models' => [
        /*
         * The model you want to use as a MonitoredScheduledTask model needs to extend the
         * `Spatie\ScheduleMonitor\Models\MonitoredScheduledTask` Model.
         */
        'monitored_scheduled_task' => \Pentangle\BackpackMonitoredScheduledTasks\Models\MonitoredScheduledTask::class,

        /*
         * The model you want to use as a MonitoredScheduledTaskLogItem model needs to extend the
         * `Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem` Model.
         */
        'monitored_scheduled_log_item' => Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem::class,
    ],

    /*
     * Oh Dear can notify you via Mail, Slack, SMS, web hooks, ... when a
     * scheduled task does not run on time.
     *
     * More info: https://ohdear.app/cron-checks
     */
    'oh_dear' => [
        /*
         * You can generate an API token at the Oh Dear user settings screen
         *
         * https://ohdear.app/user/api-tokens
         */
        'api_token' => env('OH_DEAR_API_TOKEN', ''),

        /*
         *  The id of the site you want to sync the schedule with.
         *
         * You'll find this id on the settings page of a site at Oh Dear.
         */
        'site_id' => env('OH_DEAR_SITE_ID'),

        /*
         * To keep scheduled jobs as short as possible, Oh Dear will be pinged
         * via a queued job. Here you can specify the name of the queue you wish to use.
         */
        'queue' => env('OH_DEAR_QUEUE'),
    ],
];
```

[comment]: <> (## Usage)

[comment]: <> (## Testing)

```bash
composer test
```

## Credits

- [Séan Poynter-Smith](https://github.com/Pentangle)

[comment]: <> (- [All Contributors]&#40;../../contributors&#41;)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
