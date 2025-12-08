<?php

namespace App\Policies;

use App\Models\MuscleGroup;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MuscleGroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MuscleGroup $muscleGroup): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
		$role = strtolower($user->role);
        return in_array($role, ['admin', 'instrutor']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $role = strtolower($user->role);
        return in_array($role, ['admin', 'instrutor']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return strtolower($user->role) == 'instrutor';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MuscleGroup $muscleGroup): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MuscleGroup $muscleGroup): bool
    {
        return false;
    }
}
