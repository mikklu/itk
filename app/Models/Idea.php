<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id', 'description', 'url', 'client_id', 'instructor_id', 'is_urgent', 'phase_id', 'deadline', 'completed'];

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
