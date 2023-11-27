<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')
            ->with(['access_type' => 'offline', "prompt" => "consent select_account"])
            ->redirect();
    }

    public function googleHandle()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::updateOrCreate([
                'google_id' => $user->getId()
            ], [
                'role_id' => 2,
                'username' => $user->getName(),
                'email' => $user->getEmail(),
                'profile_image' => $user->getAvatar(),
                'token' => $user->token,
                'refresh_token' => $user->refreshToken
            ]);

            if ($user->email == 'krafsteam@gmail.com') {
                $findUser->role_id = 1;
                $findUser->save();
            }

            if ($findUser->role_id == 2) {
                $findCustomer = Customer::where('user_id', $findUser->_id)->first();

                if (!$findCustomer) {
                    $findCustomer = Customer::create([
                        'user_id' => $findUser->_id,
                        'phone' => "",
                        'fullName' => "",
                        'age' => "",
                        'birthday' => "",
                        'country' => "",
                        'state' => "",
                        'city' => "",
                        'districts' => "",
                        'subDistricts' => "",
                        'zipCode' => "",
                        'detailAddress' => "",
                    ]);
                }
            }

            Auth::login($findUser);

            return redirect('/');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
