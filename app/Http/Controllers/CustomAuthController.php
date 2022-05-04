<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Status;
use Illuminate\Support\Facades\Artisan;
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('/auth/login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('homepage')
                ->with('message', 'Signed in');
        }

        return redirect("login")->with('message', 'Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("homepage")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {

            if (Auth::user()->last_login_at == NULL) {
                // $user = $event->user;
                Artisan::call('db:seed', ['--class' => 'StartDataSeeder']);
            }
            Auth::user()->last_login_at = now();
            Auth::user()->save();


            return view('/fragments/homepage');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('homepage');
    }
}