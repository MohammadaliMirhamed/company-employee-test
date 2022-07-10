<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class DepartmentService
{
    
    /**
     * Get all departments
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $limit
     * @return mixed
     */
    public function list($request, $limit = 10) :mixed
    {
        $departments = Cache::tags(['department'])->remember('department.page.' . $request->get('page'), 60 * 24, function () use ($request, $limit) {
            return Department::with(['leader','division'])->orderBy('id','desc')->paginate($limit);
        });

        return $departments;
    } 
    
    /**
     * Create a new department
     * 
     * @param  Illuminate\Http\Request $request
     * @return array
     */
    public function create($request) :array
    {
        $exist_department_leader = Department::where('name', $request->get('department_name'))
            ->where('leader_id', $request->get('leader_id'))
            ->where('division_id', $request->get('division_id'))
            ->first();

        if ($exist_department_leader) {
            return ['type' => 'error', 'message' => 'Department leader already exists'];
        }

        $department = new Department();
        $department->name = $request->get('department_name');
        $department->leader_id = $request->get('leader_id');
        $department->division_id = $request->get('division_id');
        $department->save();

        return ['type' => 'success', 'message' => 'Department created successfully'];
    }

    /**
     * Get an department by id
     * 
     * @param  int $id
     * @return Department
     */
    public function find($id) :Department
    {
        $department = Department::find($id);

        return $department;
    }
    
    /**
     * Update an department
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return array
     */
    public function update($request, $id) :array
    {
        $exist_department_leader = Department::where('name', $request->get('department_name'))
            ->where('leader_id', $request->get('leader_id'))
            ->where('division_id', $request->get('division_id'))
            ->first();

        if ($exist_department_leader) {
            return ['type' => 'error', 'message' => 'Department leader already exists'];
        }
        
        $department = Department::find($id);
        $department->name = $request->get('department_name');
        $department->leader_id = $request->get('leader_id');
        $department->division_id = $request->get('division_id');
        $department->save();

        return ['type' => 'success', 'message' => 'Department updated successfully'];
    }

    /**
     * Delete an department
     * 
     * @param  int $id
     * @return array
     */
    public function delete($id) :array
    {
        $department = Department::find($id);
        $department->delete();

        return ['type' => 'success', 'message' => 'Department deleted successfully'];
    }

    /**
     * Get all divisions
     * 
     * @return Collection
     */
    public function divisionList() :Collection
    {
        $divisions = Division::orderBy('id','desc')->get();

        return $divisions;
    }

}
