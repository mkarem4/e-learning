<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Validator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    /**
     * Show the form for login.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if (Cookie::has('access_token') || Session::has('access_token')) { 
            return redirect('/admincp/dashboard');
        } else {
            return view('admin.auth.login');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    { 
        $accessToken = $request->access_token;
        $admin = json_encode($request->admin);

        $expires_at = time() + 86400;  // expire time of jwt token

         if ($request->remember_me == 'true') {
            
             $lifetime = time() + 60 * 60 * 24 * 365; // one year
             Cookie::queue('access_token', 'bearer '.$accessToken, $lifetime);
             Cookie::queue('admin', $admin, $lifetime);
             Cookie::queue('expires_at', $expires_at, $lifetime);

         } else {

            Session::put([
                'access_token' => 'bearer '.$accessToken,
                'admin' => $admin, 
                'expires_at'   => $expires_at
            ]);

         }

        return response()->json($accessToken);
    }

    public function logout(Request $request)
    {
        // remove token 
        Cookie::queue(
            Cookie::forget('access_token'),
            Cookie::forget('admin'),
            Cookie::forget('expires_at')
        );
        // Session::flush();
        Session::forget(['access_token', 'expires_at', 'admin']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword()
    {
        return view('admin.auth.password.email');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword()
    {
        return view('admin.auth.password.reset');
    }

}
