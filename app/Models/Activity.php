<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function Assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function scopeActivity($query, array $activities)
    {
        if(isset($activities['search']) ? $activities['search'] : false) {
            return $query->where('id', 'like', '%' . $activities['search'] . '%')
                        ->orWhere('activity', 'like', '%' . $activities['search'] . '%');
        }
    }
}
