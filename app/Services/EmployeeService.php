<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class EmployeeService
{
    protected $organizations = [
        'division' => [
            'table' => 'divisions',
            'table_member' => 'division_members',
            'foreign_key' => 'division_id',
        ],
        'department' => [
            'table' => 'departments',
            'table_member' => 'department_members',
            'foreign_key' => 'department_id',
        ],
        'team' => [
            'table' => 'teams',
            'table_member' => 'team_members',
            'foreign_key' => 'team_id',
        ]
    ];
    
    /**
     * Get all employees
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $limit
     * @return mixed
     */
    public function list($request, $limit = 10) :mixed
    {
        $employees = Cache::tags(['employee'])->remember('employee.page.' . $request->get('page'), 60 * 24, function () use ($request, $limit) {
            return Employee::orderBy('id','desc')->paginate($limit);
        });

        return $employees;
    } 
    
    /**
     * Create a new employee
     * 
     * @param  Illuminate\Http\Request $request
     * @return array
     */
    public function create($request) :array
    {
        $employee = new Employee();
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->save();

        return ['type' => 'success', 'message' => 'Employee created successfully'];
    }

    /**
     * Get an employee by id
     * 
     * @param  int $id
     * @return Employee
     */
    public function get($id) :Employee
    {
        $employee = Employee::find($id);

        return $employee;
    }

    /**
     * Update an employee
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return array
     */
    public function update($request, $id) :array
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->get('first_name');
        $employee->last_name = $request->get('last_name');
        $employee->save();

        return ['type' => 'success', 'message' => 'Employee updated successfully'];
    }

    /**
     * Delete an employee
     * 
     * @param  int $id
     * @return array
     */
    public function delete($id) :array
    {
        $employee = Employee::find($id);
        $employee->delete();

        return ['type' => 'success', 'message' => 'Employee deleted successfully'];
    }

    /**
     * Get list of organization
     * 
     * @param  string $organization
     * @return array
     */
    public function getOrganizationItems($organization) :array
    {
        if (isset($this->organizations[$organization])) {
            return DB::table($this->organizations[$organization]['table'])->get()->toArray();
        }

        return [];
    }

    /**
     * Add employee to organization
     * 
     * @param int $employee_id
     * @param string $organization
     * @param int $organization_id
     * @return array
     */
    public function addToOrganization($employee_id, $organization, $request) :array
    {
        if (isset($this->organizations[$organization])) {
            $table = $this->organizations[$organization]['table_member'];
            $foreign_key = $this->organizations[$organization]['foreign_key'];
            $organization_id = $request->get('organization_id');

            $exist_employee_in_organization = DB::table($table)
                ->where('employee_id', $employee_id)
                ->where($foreign_key, $organization_id)
                ->first();

            if ($exist_employee_in_organization) {
                return ['type' => 'error', 'message' => 'Employee already in organization'];
            }

            DB::table($table)->insert(['employee_id' => $employee_id, $foreign_key => $organization_id]);
            return ['type' => 'success', 'message' => 'Employee added in organization'];
            
        }
    
        return ['type' => 'error', 'message' => 'Employee already in organization'];
    }


}
