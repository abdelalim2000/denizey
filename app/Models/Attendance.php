<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'attendances';
    protected $fillable = ['title', 'report_id', 'date'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function memberAttendances(): HasMany
    {
        return $this->hasMany(MemberAttendance::class);
    }
}
