<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workout extends Model
{
	use SoftDeletes;
	
    protected $table = 'workout';

    protected $fillable = [
        'id',
        'workout_desc',
        'expiration_date',
        'maximum_sections',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function workoutExercise() {
        return $this->hasMany(WorkoutExercise::class, 'workout_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workoutSession() {
        return $this->hasMany(WorkoutSession::class, 'workout_id');
    }
}
