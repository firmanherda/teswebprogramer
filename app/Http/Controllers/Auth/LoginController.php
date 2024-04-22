<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    
    class LoginController extends Controller
    {
        public function index()
        {
            return view('auth.login');
        }
        
        public function login(Request $request)
        {
            $validatedData = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ], [
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email harus dalam format yang benar.',
                'password.required' => 'Password wajib diisi.',
            ]);
            
            
            if(auth()->attempt(array('email'=>$request->email, 'password'=>$request->password)))
            {
                return redirect()->route('admin.product.index');
            }
            else
            {
                return redirect()->route('login')
                    ->withErrors(['error'=>'Username atau password salah!']);
            }
        }
        
        public function logout()
        {
            Auth::logout();
            return redirect('login');
        }
    }
