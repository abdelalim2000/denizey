<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchInstructor extends Model
{
    use HasFactory;

    protected $table = 'batch_instructors';

    protected $fillable = ['instructor_id', 'batch_id'];
}
