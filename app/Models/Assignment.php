<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';

    protected $guarded = [''];

    protected $dates = [
        'startDate', 'endDate'
    ];

    // public function scopeAssignment($query, array $assignments)
    // {
    //     // return $query->whereHas('staff', function($query, $assignments) {
            
    //     // });
    // }

    // Nama relasi : staff, client, activity
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
