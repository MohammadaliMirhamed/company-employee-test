<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class Department extends BaseModel
{
    /**
     * The attribute name for the table.
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'leader_id',
        'division_id',
    ];

    // relationships -------------------------------------------------------
    public function leader()
    {
        return $this->belongsTo(Employee::class, 'leader_id');
    }

    public function members()
    {
        return $this->hasMany(DepartmentMember::class, 'department_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'department_id');
    }
}