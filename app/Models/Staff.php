<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $guarded = [''];

    public function Assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // public function scopeStaff($query, array $staffs)
    // {
    //     if(isset($staffs['search']) ? $staffs['search'] : false) {
    //         return $query->where('id', 'like', '%' . $staffs['search'] . '%')
    //                     ->orWhere('name', 'like', '%' . $staffs['search'] . '%')
    //                     ->orWhere('phone', 'like', '%' . $staffs['search'] . '%');
    //     }
    // }
}
