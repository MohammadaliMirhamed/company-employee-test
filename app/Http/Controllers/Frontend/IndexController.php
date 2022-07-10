<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Division;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;



class IndexController extends BaseController
{
    /**
     * Display oranization structure.
     *
     * @return View
     */
    public function index() :View
    {
        $organization_profile = Cache::tags(['organization'])->remember('organization.profile', 60 * 24, function () {
            return Division::with([
                'leader',
                'members.employee',
                'departments',
                'departments.leader',
                'departments.members.employee',
                'departments.teams',
                'departments.teams.leader',
                'departments.teams.members.employee',
            ])->get();
        });
        
        return view('frontend.index', compact('organization_profile'));
    }
}
