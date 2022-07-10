<?php
namespace App\Observers;
 
use App\Models\Division;
use Illuminate\Support\Facades\Cache;

 
class DivisionObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;
 
    /**
     * Handle the Division "created" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function created(Division $division)
    {
        Cache::tags(['division', 'organization'])->flush();
    }

    /**
     * Handle the Division "updated" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function updated(Division $division)
    {
        Cache::tags(['division', 'organization'])->flush();
    }

    /**
     * Handle the Division "deleted" event.
     *
     * @param  \App\Models\Division  $division
     * @return void
     */
    public function deleted(Division $division)
    {
        Cache::tags(['division', 'organization'])->flush();
    }
    
}