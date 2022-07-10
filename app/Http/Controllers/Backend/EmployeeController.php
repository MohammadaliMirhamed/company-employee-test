<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Http\Requests\EmployeeRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     * 
     * @param  EmployeeService $employeeService
     * @return View
     */
    public function index(Request $request,EmployeeService $employeeService) :View
    {
        $employees = $employeeService->list($request);
        return view('backend.employee.list')->with('employees', $employees);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() :View
    {
        return view('backend.employee.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeRequest $request
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request, EmployeeService $employeeService) :RedirectResponse
    {
        $result = $employeeService->create($request);
        return redirect()->route('employee.index')->with($request['type'], $result['message']);
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
     * @return View
     */
    public function edit($id, EmployeeService $employeeService) :View
    {
        $employee = $employeeService->get($id);
        return view('backend.employee.edit')->with('employee', $employee);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeRequest  $request
     * @param  int  $id
     * @param  EmployeeService $employeeService
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, $id, EmployeeService $employeeService) :RedirectResponse
    {
        $result = $employeeService->update($request, $id);
        return redirect()->route('employee.index')->with($result['type'], $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  EmployeeService $employeeService
     * @return RedirectResponse
     */
    public function destroy($id, EmployeeService $employeeService) :RedirectResponse
    {
        $result = $employeeService->delete($id);
        return redirect()->route('employee.index')->with($result['type'], $result['message']);
    }

    public function showAddToOrganization($id, $organization, EmployeeService $employeeService) :View
    {
        $organization_items = $employeeService->getOrganizationItems($organization);
        return view('backend.employee.add_to_organization')->with([
            'organization_items' => $organization_items,
            'employee_id' => $id,
            'organization' => $organization
        ]);
    }


    /**
     * Add Employee to a organization
     * 
     * @param  int  $id
     * @param  EmployeeService $employeeService
     * @param  String  $organization
     * @return RedirectResponse
     */
    public function addToOrganization(Request $request, $id, $organization, EmployeeService $employeeService) :RedirectResponse
    {
        $result = $employeeService->addToOrganization($id, $organization, $request);
        return redirect()->route('employee.index')->with($result['type'], $result['message']);
    }

}
