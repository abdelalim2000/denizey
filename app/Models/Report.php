<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = ['title', 'instructor_id', 'started_at', 'ended_at', 'break_start', 'break_end', 'points', 'instructor_report', 'instructor_note', 'day_date', 'task', 'batch_id'];

    public function getPoints()
    {
        return json_decode($this->points);
    }

    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class);
    }

    public function attendance(): HasOne
    {
        return $this->hasOne(Attendance::class);
    }
}
