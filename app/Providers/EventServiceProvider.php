<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Department;
use App\Models\Team;
use App\Observers\EmployeeObserver;
use App\Observers\DivisionObserver;
use App\Observers\DepartmentObserver;
use App\Observers\TeamObserver;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Employee::observe(EmployeeObserver::class);
        Division::observe(DivisionObserver::class);
        Department::observe(DepartmentObserver::class);
        Team::observe(TeamObserver::class);
    }
}
