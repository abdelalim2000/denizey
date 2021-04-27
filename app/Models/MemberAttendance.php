<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberAttendance extends Model
{
    use HasFactory;

    protected $table = 'member_attendances';

    protected $fillable = ['name', 'email', 'phone', 'attendance_id'];

    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class);
    }
}
