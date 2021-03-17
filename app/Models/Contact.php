<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'company', 'phone', 'email', 'group', 'is_client', 'is_instructor'];

    public function ideasAsClient()
    {
        return $this->hasMany(Contact::class, 'client_id');
    }

    public function ideasAsInstructor()
    {
        return $this->hasMany(Contact::class, 'instructor_id');
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
}
