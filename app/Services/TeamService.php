<?php

namespace App\Services;

use App\Models\Team;
use App\Models\Department;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class TeamService
{
    
    /**
     * Get all teams
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $limit
     * @return mixed
     */
    public function list($request, $limit = 10) :mixed
    {
        $teams = Cache::tags(['team'])->remember('team.page.' . $request->get('page'), 60 * 24, function () use ($request, $limit) {
            return Team::with(['leader','department'])->orderBy('id','desc')->paginate($limit);
        });

        return $teams;
    } 
    
    /**
     * Create a new team
     * 
     * @param  Illuminate\Http\Request $request
     * @return array
     */
    public function create($request) :array
    {
        $exist_team_leader = Team::where('name', $request->get('team_name'))
            ->where('leader_id', $request->get('leader_id'))
            ->where('department_id', $request->get('department_id'))
            ->first();

        if ($exist_team_leader) {
            return ['type' => 'error', 'message' => 'Team leader already exists'];
        }

        $team = new Team();
        $team->name = $request->get('team_name');
        $team->leader_id = $request->get('leader_id');
        $team->department_id = $request->get('department_id');
        $team->save();

        return ['type' => 'success', 'message' => 'Team created successfully'];
    }

    /**
     * Get an team by id
     * 
     * @param  int $id
     * @return Team
     */
    public function find($id) :Team
    {
        $team = Team::find($id);

        return $team;
    }
    
    /**
     * Update an team
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return array
     */
    public function update($request, $id) :array
    {
        $exist_team_leader = Team::where('name', $request->get('team_name'))
            ->where('leader_id', $request->get('leader_id'))
            ->where('department_id', $request->get('department_id'))
            ->first();

        if ($exist_team_leader) {
            return ['type' => 'error', 'message' => 'Team leader already exists'];
        }
        
        $team = Team::find($id);
        $team->name = $request->get('team_name');
        $team->leader_id = $request->get('leader_id');
        $team->department_id = $request->get('department_id');
        $team->save();

        return ['type' => 'success', 'message' => 'Team updated successfully'];
    }

    /**
     * Delete an team
     * 
     * @param  int $id
     * @return array
     */
    public function delete($id) :array
    {
        $team = Team::find($id);
        $team->delete();

        return ['type' => 'success', 'message' => 'Team deleted successfully'];
    }

    /**
     * Get all departments
     * 
     * @return Collection
     */
    public function departmentList() :Collection
    {
        $departments = Department::orderBy('id','desc')->get();

        return $departments;
    }

}
