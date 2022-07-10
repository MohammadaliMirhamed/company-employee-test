<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;

class Division extends BaseModel
{
    /**
     * The attribute name for the table.
     */
    protected $table = 'divisions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'leader_id',
    ];

    // relationships -------------------------------------------------------
    public function leader()
    {
        return $this->belongsTo(Employee::class, 'leader_id');
    }

    public function members()
    {
        return $this->hasMany(DivisionMember::class, 'division_id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'division_id');
    }


}
