<?php

namespace App\Policies;

use App\Models\User;
use App\Models\task;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class TaskPolicy {

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, task $task): bool {
        return Auth()->user()->id === $task->user->id;
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, task $task): bool {
        return Auth()->user()->id === $task->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, task $task): bool {
        return Auth()->user()->id === $task->user->id;
    }

}
