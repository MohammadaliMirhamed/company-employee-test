<?php
namespace App\Observers;
 
use App\Models\Department;
use Illuminate\Support\Facades\Cache;

 
class DepartmentObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;
 
    /**
     * Handle the Department "created" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        Cache::tags(['department', 'organization'])->flush();
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        Cache::tags(['department', 'organization'])->flush();
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param  \App\Models\Department  $department
     * @return void
     */
    public function deleted(Department $department)
    {
        Cache::tags(['department', 'organization'])->flush();
    }
    
}