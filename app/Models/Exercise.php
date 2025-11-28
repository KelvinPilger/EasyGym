<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        $this->belongsTo(Equipment::class, 'equipment_id');
    }

    public function muscleGroup() {
        $this->belongsTo(MuscleGroup::class, 'muscle_group_id');
    }

    public function workoutExercise() {
        $this->hasMany(WorkoutExercise::class, 'exercise_id');
    }
}
