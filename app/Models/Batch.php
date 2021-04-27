<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';

    protected $fillable = ['name'];

    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class, 'batch_instructors');
    }
}
