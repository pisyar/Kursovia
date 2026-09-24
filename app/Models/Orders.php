<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'payment', 'status', 'date',])]
class Orders extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
