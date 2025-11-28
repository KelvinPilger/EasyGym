<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    protected $table = 'muscle_group';

    protected $fillable = [
        'id',
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function exercise() {
        $this->hasMany(Exercise::class, 'muscle_group_id');
    }
}
