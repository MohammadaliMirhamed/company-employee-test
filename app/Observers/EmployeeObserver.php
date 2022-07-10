<?php
namespace App\Observers;
 
use App\Models\Employee;
use Illuminate\Support\Facades\Cache;

 
class EmployeeObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;
 
    /**
     * Handle the Employee "created" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function created(Employee $employee)
    {
        Cache::tags(['employee', 'organization'])->flush();
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function updated(Employee $employee)
    {
        Cache::tags(['employee', 'organization'])->flush();
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @param  \App\Models\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        Cache::tags(['employee', 'organization'])->flush();
    }
    
}