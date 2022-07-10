<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends BaseController
{
    /**
     * Display a listing of the resource.
     * 
     * @param  DepartmentService $departmentService
     * @return View
     */
    public function index(Request $request,DepartmentService $departmentService) :View
    {
        $departments = $departmentService->list($request);
        return view('backend.department.list')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  DepartmentService $departmentService
     * @return View
     */
    public function create(DepartmentService $departmentService) :View
    {
        $divisions = $departmentService->divisionList();
        return view('backend.department.new')->with('divisions', $divisions);
    }


   /**
     * Store a newly created resource in storage.
     *
     * @param  DepartmentRequest $request
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(DepartmentRequest $request, DepartmentService $departmentService) :RedirectResponse
    {
        $result = $departmentService->create($request);
        return redirect()->route('department.index')->with($result['type'], $result['message']);
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
     * @param  DepartmentService $departmentService
     * @return View
     */
    public function edit($id, DepartmentService $departmentService) :View
    {
        $department = $departmentService->find($id);
        $divisions = $departmentService->divisionList();
        return view('backend.department.edit')->with(['department' => $department, 'divisions' => $divisions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DepartmentRequest  $request
     * @param  int  $id
     * @param  DepartmentService $departmentService
     * @return RedirectResponse
     */
    public function update(DepartmentRequest $request, $id, DepartmentService $departmentService) :RedirectResponse
    {
        $result = $departmentService->update($request, $id);
        return redirect()->route('department.index')->with($result['type'], $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  DepartmentService $departmentService
     * @return RedirectResponse
     */
    public function destroy($id, DepartmentService $departmentService) :RedirectResponse
    {
        $result = $departmentService->delete($id);
        return redirect()->route('department.index')->with($result['type'], $result['message']);
    }
}
