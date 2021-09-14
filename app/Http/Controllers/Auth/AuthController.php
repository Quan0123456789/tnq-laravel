<?php
  
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use Hash;
  
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    } 
    public function registration()
    {
        return view('auth.registration');
    }
      

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('index')
                        ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->with('notice','Sai email hoặc mật khẩu');
    }
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);   
        $data = $request->all();
        $check = $this->create($data);
        return redirect('index')->with('alert','Đăng ký thành công!');
    }
    public function index()
    {
        if(Auth::check()){
            return view('product.index');
        }
        return redirect("login")->withSuccess('Bạn không được cấp quyền');
    }

    
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }


}