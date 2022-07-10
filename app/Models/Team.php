<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class Team extends BaseModel
{
    /**
     * The attribute name for the table.
     */
    protected $table = 'teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'leader_id',
        'department_id',
    ];

    // relationships -------------------------------------------------------
    public function leader()
    {
        return $this->belongsTo(Employee::class, 'leader_id');
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class, 'team_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
