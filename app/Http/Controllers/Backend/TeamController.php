<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Services\TeamService;
use App\Http\Requests\TeamRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeamController extends BaseController
{
    /**
     * Display a listing of the resource.
     * 
     * @param  TeamService $teamService
     * @return View
     */
    public function index(Request $request,TeamService $teamService) :View
    {
        $teams = $teamService->list($request);
        return view('backend.team.list')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  TeamService $departmentService
     * @return View
     */
    public function create(TeamService $teamService) :View
    {
        $departments = $teamService->departmentList();
        return view('backend.team.new')->with('departments', $departments);
    }


   /**
     * Store a newly created resource in storage.
     *
     * @param  TeamRequest $request
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(TeamRequest $request, TeamService $teamService) :RedirectResponse
    {
        $result = $teamService->create($request);
        return redirect()->route('team.index')->with($result['type'], $result['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  TeamService $teamService
     * @return View
     */
    public function edit($id, TeamService $teamService) :View
    {
        $team = $teamService->find($id);
        $departments = $teamService->departmentList();
        return view('backend.team.edit')->with(['team' => $team, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeamRequest  $request
     * @param  int  $id
     * @param  TeamService $teamService
     * @return RedirectResponse
     */
    public function update(TeamRequest $request, $id, TeamService $teamService) :RedirectResponse
    {
        $result = $teamService->update($request, $id);
        return redirect()->route('team.index')->with($result['type'], $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  TeamService $teamService
     * @return RedirectResponse
     */
    public function destroy($id, TeamService $teamService) :RedirectResponse
    {
        $result = $teamService->delete($id);
        return redirect()->route('team.index')->with($result['type'], $result['message']);
    }
}
