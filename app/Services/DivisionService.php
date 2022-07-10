<?php

namespace App\Services;

use App\Models\Division;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class DivisionService
{
    
    /**
     * Get all divisions
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $limit
     * @return mixed
     */
    public function list($request, $limit = 10) :mixed
    {
        $divisions = Cache::tags(['division'])->remember('division.page.' . $request->get('page'), 60 * 24, function () use ($request, $limit) {
            return Division::with(['leader'])->orderBy('id','desc')->paginate($limit);
        });

        return $divisions;
    } 
    
    /**
     * Create a new division
     * 
     * @param  Illuminate\Http\Request $request
     * @return array
     */
    public function create($request) :array
    {
        $exist_division_leader = Division::where('name', $request->get('division_name'))->where('leader_id', $request->get('leader_id'))->first();

        if ($exist_division_leader) {
            return ['type' => 'error', 'message' => 'Division leader already exists'];
        }

        $division = new Division();
        $division->name = $request->get('division_name');
        $division->leader_id = $request->get('leader_id');
        $division->save();

        return ['type' => 'success', 'message' => 'Division created successfully'];
    }

    /**
     * Get an division by id
     * 
     * @param  int $id
     * @return Division
     */
    public function get($id) :Division
    {
        $division = Division::find($id);

        return $division;
    }

    /**
     * Update an division
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return array
     */
    public function update($request, $id) :array
    {
        $exist_division_leader = Division::where('name', $request->get('division_name'))->where('leader_id', $request->get('leader_id'))->first();

        if ($exist_division_leader) {
            return ['type' => 'error', 'message' => 'Division leader already exists'];
        }
        
        $division = Division::find($id);
        $division->name = $request->get('division_name');
        $division->leader_id = $request->get('leader_id');
        $division->save();

        return ['type' => 'success', 'message' => 'Division updated successfully'];
    }

    /**
     * Delete an division
     * 
     * @param  int $id
     * @return array
     */
    public function delete($id) :array
    {
        $division = Division::find($id);
        $division->delete();

        return ['type' => 'success', 'message' => 'Division deleted successfully'];
    }

}
