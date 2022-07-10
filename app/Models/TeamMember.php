<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class TeamMember extends BaseModel
{
    /**
     * The attribute name for the table.
     */
    protected $table = 'team_members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_id',
        'employee_id',
    ];

    // relationships -------------------------------------------------------
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
