<?php

namespace App\Providers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;


class UserService {
        
    /**
     * getAllUsers
     *
     * @return Collection
     */
    public static function getAllUsers(): Collection {
        $users = User::with('role')->get();
        return $users;
    }

    /**
     * loginUser
     *
     * @param  string $username
     * @param  string $password
     * @return User
     */
    public static function loginUser(string $username, string $password): User {
        $user = User::where([
            ['username', '=', $username],
            ['password', '=', md5($password)],
        ])->firstOrFail();

        $user->role;
        
        return $user;
    }
}