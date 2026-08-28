<?php

namespace App\Policies;

use App\Models\User;
use App\Models\course;
use App\Models\teacher;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class coursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(teacher $teacher, course $course): bool
    {
        return $teacher->id === $course->teacher_id  ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, course $course): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, course $course): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, course $course): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, course $course): bool
    {
        return false;
    }
}
