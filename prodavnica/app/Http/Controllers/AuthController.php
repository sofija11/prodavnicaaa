<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\UserService;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public static $role_keys = [
        'Admin' => 1,
        'Radnik' => 2,
    ];

    public function loginUser(LoginRequest $request){
        $username = $request->input('username');
        $password = $request->input('password');
        try{
            $user = UserService::loginUser($username, $password);
            $request->session()->put('user', $user);
            $sesion = $request->session()->get('user');
            if ($sesion->role_id === $this->getIdFromRole('Radnik')) {
                return view('products');
            } else {
                return redirect()->route('users');
            }
        } catch(Exception $ex) {
            Log::error($ex);
            return Redirect::back()->withErrors(['message' => 'Wrong credentials']);
        }
        
    }
    
    /**
     * getIdFromRole
     *
     * @param  string $role
     * @return int
     */
    public static function getIdFromRole(string $role):int {
        return self::$role_keys[$role];
    }
}
