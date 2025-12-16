<?php


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();
        $passwordOk = false;
        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                $passwordOk = true;
            } elseif ($user->password === $credentials['password']) {
                $passwordOk = true;
            }
        }
        if (! $user || ! $passwordOk) {
            return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }

        Auth::login($user, $request->boolean('remember'));

        if ($user->role === 'admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/guest/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        if (Schema::hasColumn('users', 'role')) {
            $user->role = 'user';
        }
        $user->save();

        Auth::login($user);
        return redirect()->to('/user/dashboard');
    }
}
