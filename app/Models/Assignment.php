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
        'start_date', 'end_date'
    ];

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
