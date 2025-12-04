<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MuscleGroup;
use App\Models\Equipment;
use App\Models\WorkoutExercise;

class Exercise extends Model
{
    use SoftDeletes;

    protected $table = 'exercise';

    protected $fillable = [
        'id',
        'exercise_desc',
        'muscle_group_id',
        'equipment_id',
        'video_url',
        'image_url'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function equipment() {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'id');
    }

    public function muscleGroup() {
        return $this->belongsTo(MuscleGroup::class, 'muscle_group_id', 'id');
    }

    public function workoutExercise() {
        return $this->hasMany(WorkoutExercise::class, 'exercise_id');
    }
}
