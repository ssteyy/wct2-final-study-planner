<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studySessions()
    {
        return $this->hasMany(StudySession::class);
    }

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }
}