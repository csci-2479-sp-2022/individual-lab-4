<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VideoGame;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class VideoGamePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        Log::info('user role: ' . $user->role->name);
        $readPerm = $user->role->permissions->where('name', 'read_game')->first();
        Log::info('permission: ' . $readPerm?->name);

        return $readPerm !== null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, VideoGame $videoGame)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        Log::info('user role: ' . $user->role->name);
        $writePerm = $user->role->permissions->where('name', 'write_game')->first();
        Log::info('permission: ' . $writePerm?->name);

        return $writePerm !== null;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, VideoGame $videoGame)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, VideoGame $videoGame)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, VideoGame $videoGame)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideoGame  $videoGame
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, VideoGame $videoGame)
    {
        //
    }
}
