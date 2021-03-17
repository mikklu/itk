<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'idea_id',
        'contact_id'
    ];
}
