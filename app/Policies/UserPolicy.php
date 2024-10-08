<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser, User $user): bool
    {
        return $currentUser['id'] === $user['id'];
    }

    public function destroy(User $currentUser, User $user): bool
    {
        return $currentUser['is_admin'] && $currentUser['id'] !== $user['id'];
    }

    public function follow(User $currentUser, User $user): bool
    {
        return $currentUser['id'] !== $user['id'];
    }
}
