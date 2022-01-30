<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class UserService {
    
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