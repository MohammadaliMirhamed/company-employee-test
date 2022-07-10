<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Services\DivisionService;
use App\Http\Requests\DivisionRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DivisionController extends BaseController
{
    /**
     * Display a listing of the resource.
     * 
     * @param  DivisionService $employeeService
     * @return View
     */
    public function index(Request $request,DivisionService $divisionService) :View
    {
        $divisions = $divisionService->list($request);
        return view('backend.division.list')->with('divisions', $divisions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() :View
    {
        return view('backend.division.new');
    }


   /**
     * Store a newly created resource in storage.
     *
     * @param  DivisionRequest $request
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(DivisionRequest $request, DivisionService $divisionService) :RedirectResponse
    {
        $result = $divisionService->create($request);
        return redirect()->route('division.index')->with($result['type'], $result['message']);
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
     * @param  DivisionService $divisionService
     * @return View
     */
    public function edit($id, DivisionService $divisionService) :View
    {
        $division = $divisionService->get($id);
        return view('backend.division.edit')->with('division', $division);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DivisionRequest  $request
     * @param  int  $id
     * @param  DivisionService $divisionService
     * @return RedirectResponse
     */
    public function update(DivisionRequest $request, $id, DivisionService $divisionService) :RedirectResponse
    {
        $result = $divisionService->update($request, $id);
        return redirect()->route('division.index')->with($result['type'], $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  DivisionService $divisionService
     * @return RedirectResponse
     */
    public function destroy($id, DivisionService $divisionService) :RedirectResponse
    {
        $result = $divisionService->delete($id);
        return redirect()->route('division.index')->with($result['type'], $result['message']);
    }
}
