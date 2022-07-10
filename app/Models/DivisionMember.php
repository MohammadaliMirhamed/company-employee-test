<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class DivisionMember extends BaseModel
{
    /**
     * The attribute name for the table.
     */
    protected $table = 'division_members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'division_id',
        'employee_id',
    ];

    // relationships -------------------------------------------------------
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
