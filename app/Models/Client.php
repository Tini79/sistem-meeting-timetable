<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $guarded = [''];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // public function scopeClient($query, array $clients)
    // {
    //     if(isset($clients['search']) ? $clients['search'] : false) {
    //         return $query->where('id', 'like', '%' . $clients['search'] . '%')
    //                     ->orWhere('company_name', 'like', '%' . $clients['search'] . '%')
    //                     ->orWhere('addr', 'like', '%' . $clients['search'] . '%')
    //                     ->orWhere('phone', 'like', '%' . $clients['search'] . '%');
    //     }
    // }
}
