<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    protected $fillable = ['name'];

    public function batch(): BelongsToMany
    {
        return $this->belongsToMany(Batch::class, 'batch_instructors');
    }
}
