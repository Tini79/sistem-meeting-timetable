<?php

namespace App\Models;

use App\Enums\LevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $guarded = [''];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    protected $casts = [
        'status_perkawinan' => LevelEnum::class,
    ];
}
