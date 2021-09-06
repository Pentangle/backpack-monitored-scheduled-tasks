<?php

namespace Pentangle\BackpackMonitoredScheduledTasks\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Pentangle\BackpackMonitoredScheduledTasks\Models\MonitoredScheduledTask;


/**
 * Class MonitoredScheduledTaskCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MonitoredScheduledTaskCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(MonitoredScheduledTask::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/monitored-scheduled-task');
        CRUD::setEntityNameStrings('monitored scheduled task', 'monitored scheduled tasks');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->removeAllButtons();
        $this->crud->disableResponsiveTable();
        CRUD::column('name');
        CRUD::column('cron_expression');
        CRUD::column('grace_time_in_minutes');
        CRUD::column('last_failed_at');
        CRUD::column('last_finished_at');
//        CRUD::column('last_pinged_at');
        CRUD::column('last_skipped_at');
        CRUD::column('last_started_at');
//        CRUD::column('ping_url');
//        CRUD::column('registered_on_oh_dear_at');
        CRUD::column('timezone');
        CRUD::column('type');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        abort(404);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
